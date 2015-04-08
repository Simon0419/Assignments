/*
 * @Student Name: Liang Yulu
 * @Login Name: yulul
 * @Student ID: 103242
 * @Last Modified: 25/09/2011
 * 
 * @Describe: TV Guide form to show the detail of user selection.
 *            Select the Date time picker and channel list to show all programs.
 *            Click the record button to record the current program into tbl_todolist.
 *            Click the season pass button to record the title of the current program into tbl_seasonpass 
 *            and select all same title from tbl_tvguide to tbl_todolist.
 *            Click the close button to disconnect the database and quit TV Guide form.
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

public enum BroadcastStation { ABC1, SCTV, TDT }

namespace yululAssignment1
{
    public partial class ProgramGuide : Form
    {
        MySqlConnection conn;
        DataTable table = new DataTable();

        public ProgramGuide()
        {
            InitializeComponent();

            conn = new MySqlConnection("Database=yulul;Data Source=alacritas.cis.utas.edu.au;User Id=yulul;Password=103242");
            conn.Open();

            //To show all channel in channel list.
            channelList.DataSource = Enum.GetValues(typeof(BroadcastStation));
        }

        //To display all programs based on selecting datetime and channel.
        private void displayPrograms(object sender, EventArgs e)
        {
            DateTime chosenDate = dateTimePicker.Value;
            BroadcastStation selectedChannel = (BroadcastStation)channelList.SelectedItem;

            IEnumerable<TVProgram> tvps = from t in table.AsEnumerable()
                                          where chosenDate.Month == t.Field<DateTime>("starttime").Month
                                          where chosenDate.Day == t.Field<DateTime>("starttime").Day
                                          where chosenDate.Year == t.Field<DateTime>("starttime").Year
                                          where selectedChannel == (BroadcastStation)Enum.Parse(typeof(BroadcastStation), t.Field<string>("channel"))
                                          select new TVProgram
                                          {
                                              Title = t.Field<string>("title"),
                                              EpisodeTitle = t.Field<string>("episodetitle"),
                                              Description = t.Field<string>("description"),
                                              Duration = t.Field<int>("duration"),
                                              Channel = (BroadcastStation)Enum.Parse(typeof(BroadcastStation), t.Field<string>("channel")),
                                              StartTime = t.Field<DateTime>("starttime")
                                          };

            programView.DataSource = tvps.ToList<TVProgram>();
            programView.DisplayMember = "GuideTitle";
        }

        //to show the description based on selection from program list.
        private void displayDescription(object sender, EventArgs e)
        {
            descriptionView.Text = ((TVProgram)programView.SelectedItem).ToString();
        }

        //to close the current form and disconnect the database.
        private void closeClick(object sender, EventArgs e)
        {
            conn.Close();
            Close();
        }

        //the season pass button method to record into tbl_seasonpass and tbl_todolist from tbl_tvguide.
        private void createSeasonPass(object sender, EventArgs e)
        {
            TVProgram tvp = (TVProgram)programView.SelectedItem;

            bool noSelectedSeason = true; //to check if current title have already stored in the tbl_seasonpass.
            bool noSelectedList = true;//to check if current title have already stored in the tbl_todolist.
            SeasonProgram sp = new SeasonProgram(); //intial the seasonProgram to using Priority.

            //To search the current title from tbl_SeasonPass and if there are any value and return noSelectedSeason a false.
            using (MySqlCommand checkRecordCmd = new MySqlCommand("select title from tbl_SeasonPass where title = ?title", conn))
            {
                checkRecordCmd.Parameters.AddWithValue("?title", tvp.Title);

                using (MySqlDataReader rdr = checkRecordCmd.ExecuteReader())
                {
                    if (rdr.Read())
                        noSelectedSeason = false;
                }
            }

            //To search the current title from tbl_ToDoList and if there are any value and return noSelectedList a false.
            using (MySqlCommand checkRecordCmd = new MySqlCommand("select * from tbl_ToDoList where title = ?title", conn))
            {
                checkRecordCmd.Parameters.AddWithValue("?title", tvp.Title);

                using (MySqlDataReader rdr = checkRecordCmd.ExecuteReader())
                {
                    if (rdr.Read())
                        noSelectedList = false;
                }
            }

            //To get the max priority value from tbl_SeasonPass. If return a null then set Priority to 0 and if not, then increase the Priority.
            using (MySqlCommand maxPriorityCmd = new MySqlCommand("select max(priority) from tbl_SeasonPass", conn))
            {
                using (MySqlDataReader rdr = maxPriorityCmd.ExecuteReader())
                {
                    if (rdr.Read() && rdr.IsDBNull(0))
                        sp.Priority = 0;
                    else
                        sp.Priority = rdr.GetInt16(rdr.GetOrdinal("max(priority)")) + 1;

                }
            }

            //Check if current title did not exist in tbl_seasonPass and if so, then insert the new priority and title into tbl_seasonPass.
            if (noSelectedSeason)
            {
                using (MySqlCommand insertPriorityCmd = new MySqlCommand("insert into tbl_SeasonPass (title,priority) values (?title,?priority)", conn))
                {
                    insertPriorityCmd.Parameters.AddWithValue("?title", tvp.Title);
                    insertPriorityCmd.Parameters.AddWithValue("?priority", sp.Priority);

                    insertPriorityCmd.ExecuteNonQuery();
                }
            }

            //Check if current title did not exist in tbl_ToDoList and if so, then insert all match value from tbl_tvguide to tbl_ToDoList.
            if (noSelectedList)
            {
                using (MySqlCommand findCmd = new MySqlCommand("select * from tbl_tvguide where title = ?title", conn))
                {
                    findCmd.Parameters.AddWithValue("?title", tvp.Title);

                    TVProgramIndexer list = new TVProgramIndexer(20);

                    using (MySqlDataReader rdr = findCmd.ExecuteReader())
                    {
                        int count = 0;

                        //To store all value from tbl_tvguide using ToRecordProgram class as a list.
                        while (rdr.Read())
                        {
                            BroadcastStation bcs = (BroadcastStation)Enum.Parse(typeof(BroadcastStation), (string)rdr[2]);
                            list[count] = new ToRecordProgram((string)rdr["title"], (string)rdr["episodetitle"], (string)rdr["description"], bcs, rdr.GetDateTime(rdr.GetOrdinal("starttime")), rdr.GetInt16(rdr.GetOrdinal("duration")));
                            count++;
                        }

                        rdr.Close();

                        //To insert all value from list.
                        for (int i = 0; i < count; i++)
                        {
                            using (MySqlCommand insertCmd = new MySqlCommand("insert into tbl_ToDoList (title, episodetitle, description, channel, starttime, duration) values (?title,?episodetitle,?description,?channel,?starttime,?duration)", conn))
                            {
                                insertCmd.Parameters.AddWithValue("?title", list[i].Title);
                                insertCmd.Parameters.AddWithValue("?episodetitle", list[i].EpisodeTitle);
                                insertCmd.Parameters.AddWithValue("?description", list[i].Description);
                                insertCmd.Parameters.AddWithValue("?channel", list[i].Channel.ToString());
                                insertCmd.Parameters.AddWithValue("?starttime", list[i].StartTime);
                                insertCmd.Parameters.AddWithValue("?duration", list[i].Duration);

                                insertCmd.ExecuteNonQuery();
                            }
                        }
                    }
                }
            }
        }

        //record button method to record current program into tbl_ToDoList.
        private void recordProgram(object sender, EventArgs e)
        {
            TVProgram tvp = (TVProgram)programView.SelectedItem;

            bool noSelectedValue = true;

            //To search the current title from tbl_ToDoList and if there are any value and return noSelectedList a false.
            using (MySqlCommand checkRecordCmd = new MySqlCommand("select * from tbl_ToDoList where title = ?title", conn))
            {
                checkRecordCmd.Parameters.AddWithValue("?title", tvp.Title);

                using (MySqlDataReader rdr = checkRecordCmd.ExecuteReader())
                {
                    if (rdr.Read())
                        noSelectedValue = false;
                }
            }

            //If it has not any current title and then insert all into tbl_todolist.
            if (noSelectedValue)
            {
                using (MySqlCommand insertRecordCmd = new MySqlCommand("insert into tbl_ToDoList (title, episodetitle, description, channel, starttime, duration) values (?title,?episodetitle,?description,?channel,?starttime,?duration)", conn))
                {
                    insertRecordCmd.Parameters.AddWithValue("?title", tvp.Title);
                    insertRecordCmd.Parameters.AddWithValue("?episodetitle", tvp.EpisodeTitle);
                    insertRecordCmd.Parameters.AddWithValue("?description", tvp.Description);
                    insertRecordCmd.Parameters.AddWithValue("?channel", tvp.Channel.ToString());
                    insertRecordCmd.Parameters.AddWithValue("?starttime", tvp.StartTime);
                    insertRecordCmd.Parameters.AddWithValue("?duration", tvp.Duration);

                    insertRecordCmd.ExecuteNonQuery();
                }
            }
        }

        //load method to select a channel from channel list.
        private void ProgramGuide_Load(object sender, EventArgs e)
        {
            MySqlDataAdapter dataAdapter = new MySqlDataAdapter("select * from tbl_tvguide", conn);
            dataAdapter.Fill(table);
            channelList.SetSelected(0, true);
        }
    }
}
