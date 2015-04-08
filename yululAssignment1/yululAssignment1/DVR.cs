/*
 * @Student Name: Liang Yulu
 * @Login Name: yulul
 * @Student ID: 103242
 * @Last Modified: 25/09/2011
 * 
 * @Describe: This is the main window of DVR program. It has a menu including File and View. 
 *            In the File, user can import and export the xml file from tbl_tvguide.
 *            Clicked the Close selection, then quit this program.
 */

using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using System.Xml.Linq;
using System.Xml;

namespace yululAssignment1
{
    public partial class DVR : Form
    {
        MySqlConnection conn;//Intial the connection.

        //Connect to my Database and open it.
        public DVR()
        {
            InitializeComponent();

            conn = new MySqlConnection("Database=yulul;Data Source=alacritas.cis.utas.edu.au;User Id=yulul;Password=103242");
            conn.Open();
        }

        //To show the TV guide form.
        private void displayGuide(object sender, EventArgs e)
        {
            new ProgramGuide().Show();
        }

        //To close this program and connection.
        private void quitProgram(object sender, EventArgs e)
        {
            conn.Close();
            Close();
        }

        //To show the Season Pass form.
        private void displayManager(object sender, EventArgs e)
        {
            new SeasonPassManager().Show();
        }

        private void DVR_Load(object sender, EventArgs e)
        {

        }

        //To show the To Do list form.
        private void displayToDoList(object sender, EventArgs e)
        {
            new ToDoList().Show();
        }

        //To import the xml file from the tbl_tvguide.
        private void importXML(object sender, EventArgs e)
        {
            
            //Intial all value for insert into Database.             
            string title = ""; 
            string episodeTitle = ""; 
            string description = "";
            BroadcastStation? channel = null;
            string starttime = "";
            DateTime? st = null;
            int duration = 0;

            //create the Open file window from select a xml file.
            OpenFileDialog ofd = new OpenFileDialog();
            ofd.Title = "Import";
            ofd.Filter = "XML files (*.xml)|*.xml";

            //If user open a xml file then enter it.
            if (ofd.ShowDialog() == DialogResult.OK)
            {
                //To open this xml file and write all element into that.
                using (var xr = new XmlTextReader(ofd.OpenFile()))
                {
                    //To delete all data in tbl_tvguide.
                    using (MySqlCommand cmd = new MySqlCommand("delete from tbl_tvguide", conn))
                    {
                        cmd.ExecuteNonQuery();
                    }

                    //To read all value based on the name of element and insert into tbl_tvguide.
                    while (xr.Read())
                    {
                        if ("Title" == xr.Name)
                            title = xr.ReadString();
                        else if ("EpisodeTitle" == xr.Name)
                            episodeTitle = xr.ReadString();
                        else if ("Description" == xr.Name)
                            description = xr.ReadString();
                        else if ("Channel" == xr.Name)
                            channel = (BroadcastStation)Enum.Parse(typeof(BroadcastStation), (string)xr.ReadString());
                        else if ("StartTime" == xr.Name)
                        {
                            starttime = xr.ReadString();
                            st = DateTime.Parse(starttime);
                        }
                        else if ("Duration" == xr.Name)
                        {
                            int.TryParse(xr.ReadString(), out duration);

                            //insert all value into tbl_tvguide and intial all value again.
                            using (MySqlCommand cmd = new MySqlCommand("insert into tbl_tvguide (title, episodetitle, description, channel, starttime, duration) values (?title,?episodetitle,?description,?channel,?starttime,?duration)", conn))
                            {
                                cmd.Parameters.AddWithValue("?title", title);
                                cmd.Parameters.AddWithValue("?episodetitle", episodeTitle);
                                cmd.Parameters.AddWithValue("?description", description);
                                cmd.Parameters.AddWithValue("?channel", channel.ToString());
                                cmd.Parameters.AddWithValue("?starttime", st);
                                cmd.Parameters.AddWithValue("?duration", duration);

                                cmd.ExecuteNonQuery();

                                title = "";
                                episodeTitle = "";
                                description = "";
                                channel = null;
                                st = null;
                                duration = 0;
                            }
                        }
                    }
                }
            }
        }

        //To export the xml file using a given name from tbl_tvguide
        private void exportXML(object sender, EventArgs e)
        {
            //create a saving window.
            SaveFileDialog sfd = new SaveFileDialog();

            sfd.Title = "Export";
            sfd.FileName = "new_XML";
            sfd.Filter = "XML files (*.xml)|*.xml";

            //If user click "save" and enter it
            if (sfd.ShowDialog() == DialogResult.OK)
            {
                //to open this xml file and write all value into it.
                using (var xr = new XmlTextWriter(sfd.OpenFile(), null))
                {
                    xr.Formatting = Formatting.Indented;
                    xr.Indentation = 4;

                    xr.WriteStartDocument();
                    xr.WriteStartElement("TVGuide");

                    //to read all value from tbl_tvguide and write down into xml file.
                    using (MySqlCommand cmd = new MySqlCommand("select * from tbl_tvguide", conn))
                    {
                        using (MySqlDataReader rdr = cmd.ExecuteReader())
                        {
                            while (rdr.Read())
                            {
                                xr.WriteStartElement("Program");
                                xr.WriteElementString("Title", (string)rdr["title"]);
                                xr.WriteElementString("EpisodeTitle ", (string)rdr["episodetitle"]);
                                xr.WriteElementString("Description ", (string)rdr["description"]);
                                xr.WriteElementString("Channel", (string)rdr["channel"]);
                                xr.WriteElementString("StartTime", rdr.GetDateTime(rdr.GetOrdinal("starttime")).ToString());
                                xr.WriteElementString("Duration", rdr.GetInt16(rdr.GetOrdinal("duration")).ToString());
                                xr.WriteEndElement();
                            }
                        }
                    }
                    xr.WriteEndElement();
                    xr.Flush();
                }
            }
        }
    }
}
