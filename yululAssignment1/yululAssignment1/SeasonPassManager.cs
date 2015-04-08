/*
 * @Student Name: Liang Yulu
 * @Login Name: yulul
 * @Student ID: 103242
 * @Last Modified: 25/09/2011
 * 
 * @Describe: Season Pass Manger form to manage the priority of tbl_seasonpass.
 *            up button the move a current selected title to move up.
 *            dowm button the move a current selected title to move down.
 *            delete button the remove a current selected title.
 *            close button to close the current form and disconnect the database.
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

namespace yululAssignment1
{
    public partial class SeasonPassManager : Form
    {
        MySqlConnection conn;
        DataTable table = new DataTable();
        MySqlDataAdapter dataAdapter;
        MySqlCommandBuilder commandBuilder;

        public SeasonPassManager()
        {
            InitializeComponent();

            conn = new MySqlConnection("Database=yulul;Data Source=alacritas.cis.utas.edu.au;User Id=yulul;Password=103242");
            conn.Open();
        }

        //to close this form and disconnect the database.
        private void closeClick(object sender, EventArgs e)
        {
            conn.Close();
            Close();
        }

        //a method to delete the selected program.
        private void deleteProgram(object sender, EventArgs e)
        {
            int tempPriority = 0; // a temp int to store a priority value.
            int tempIndex = programList.SelectedIndex; //a temp index to store the selected index.
            int max = programList.Items.Count - 1; // the max number of priority.

            var deleteCommand = new MySqlCommand("delete from tbl_SeasonPass where title = ?title", conn);
            deleteCommand.Parameters.Add(new MySqlParameter() { ParameterName = "?title", SourceColumn = "title", });
            dataAdapter.DeleteCommand = deleteCommand;

            //if the selected index is max value then decrease the temp index. 
            if (programList.SelectedIndex == max && programList.SelectedIndex != 0)
                tempIndex = programList.SelectedIndex - 1;

            //if selected index is in the range then set up other priority value before deleting.
            if (programList.SelectedIndex < max && programList.SelectedIndex >= 0)
            {
                for (int i = programList.SelectedIndex; i < max; i++)
                {
                    tempPriority = ((int)table.Rows[i + 1]["priority"]) - 1;
                    table.Rows[i + 1]["priority"] = tempPriority;
                }
            }

            //to delete the selected priority.
            if (programList.SelectedIndex >= 0)
                table.Rows[programList.SelectedIndex].Delete();

            //Update the table.
            dataAdapter.Update(table);

            //to set a new selected index after removing.
            if (tempIndex > 0)
                programList.SelectedIndex = tempIndex;

        }

        //a method to swap the selected priority with the one above.
        private void up_Click(object sender, EventArgs e)
        {
            int tempPriority = 0;// a temp int to store a priority value.
            string tempTitle = "";// a temp string to store a title value.
            int tempIndex = 1;//a temp index to store the selected index.
            int max;// the max number of priority.
            bool isNull = true;//to check if there is any value in tbl_seasonpass for setting a new selectedindex.

            //to get the max value in tbl_seasonPass and check there is any value.
            using (MySqlCommand maxPriorityCmd = new MySqlCommand("select max(priority) from tbl_SeasonPass", conn))
            {
                using (MySqlDataReader rdr = maxPriorityCmd.ExecuteReader())
                {
                    if (rdr.Read() && rdr.IsDBNull(0))
                        max = 0;
                    else
                    {
                        max = rdr.GetInt16(rdr.GetOrdinal("max(priority)"));
                        isNull = false;
                    }
                }
            }

            var updateCommand = new MySqlCommand("update tbl_SeasonPass set priority = ?priority where title = ?title", conn);

            updateCommand.Parameters.AddRange(new MySqlParameter[]{ 
                                        new MySqlParameter(){ParameterName = "?priority",SourceColumn = "priority"}, 
                                        new MySqlParameter(){ParameterName = "?title", SourceColumn = "title", SourceVersion = DataRowVersion.Original}});

            dataAdapter.UpdateCommand = updateCommand;

            //to swap priority and title with a lower Priority.
            if (programList.SelectedIndex > 0 && programList.SelectedIndex <= max)
            {
                tempIndex = programList.SelectedIndex;

                tempPriority = (int)table.Rows[programList.SelectedIndex]["priority"];
                table.Rows[programList.SelectedIndex]["priority"] = table.Rows[programList.SelectedIndex - 1]["priority"];
                table.Rows[programList.SelectedIndex - 1]["priority"] = tempPriority;

                tempTitle = (string)table.Rows[programList.SelectedIndex]["title"];
                table.Rows[programList.SelectedIndex]["title"] = table.Rows[programList.SelectedIndex - 1]["title"];
                table.Rows[programList.SelectedIndex - 1]["title"] = tempTitle;
            }

            //update the table and refresh the programList.
            dataAdapter.Update(table);
            table.Clear();
            dataAdapter.Fill(table);

            //to set a new selectedIndex.
            if (!isNull)
                programList.SelectedIndex = tempIndex - 1;
        }

        //a method to swap the selected priority with the one below.
        private void down_Click(object sender, EventArgs e)
        {
            int tempPriority = 0;// a temp int to store a priority value.
            string tempTitle = "";// a temp string to store a priority value.
            int max;// the max number of priority.
            int tempIndex;//a temp index to store the selected index.
            bool isNull = true;//to check if there is any value in tbl_seasonpass for setting a new selectedindex.

            //to get the max value in tbl_seasonPass and check there is any value.
            using (MySqlCommand maxPriorityCmd = new MySqlCommand("select max(priority) from tbl_SeasonPass", conn))
            {
                using (MySqlDataReader rdr = maxPriorityCmd.ExecuteReader())
                {
                    if (rdr.Read() && rdr.IsDBNull(0))
                        max = 0;
                    else
                    {
                        max = rdr.GetInt16(rdr.GetOrdinal("max(priority)"));
                        isNull = false;
                    }
                }
            }
            tempIndex = max - 1;

            var updateCommand = new MySqlCommand("update tbl_SeasonPass set priority = ?priority where title = ?title", conn);

            updateCommand.Parameters.AddRange(new MySqlParameter[]{ 
                                        new MySqlParameter(){ParameterName = "?priority",SourceColumn = "priority"}, 
                                        new MySqlParameter(){ParameterName = "?title", SourceColumn = "title", SourceVersion = DataRowVersion.Original}});

            dataAdapter.UpdateCommand = updateCommand;

            //to swap priority and title with a larger Priority.
            if (programList.SelectedIndex < max && programList.SelectedIndex >= 0 && max != 0)
            {
                tempIndex = programList.SelectedIndex;
                tempPriority = (int)table.Rows[programList.SelectedIndex]["priority"];
                table.Rows[programList.SelectedIndex]["priority"] = table.Rows[programList.SelectedIndex + 1]["priority"];
                table.Rows[programList.SelectedIndex + 1]["priority"] = tempPriority;

                tempTitle = (string)table.Rows[programList.SelectedIndex]["title"];
                table.Rows[programList.SelectedIndex]["title"] = table.Rows[programList.SelectedIndex + 1]["title"];
                table.Rows[programList.SelectedIndex + 1]["title"] = tempTitle;
            }

            //update the table and refresh the programList.
            dataAdapter.Update(table);
            table.Clear();
            dataAdapter.Fill(table);

            //to set a new selectedIndex.
            if (!isNull)
                programList.SelectedIndex = tempIndex + 1;
        }

        //the load method to set up the program list.
        private void SeasonPassManager_Load(object sender, EventArgs e)
        {
            dataAdapter = new MySqlDataAdapter("select * from tbl_SeasonPass order by priority", conn);
            commandBuilder = new MySqlCommandBuilder(dataAdapter);
            dataAdapter.Fill(table);
            programList.DataSource = table;
            programList.DisplayMember = "title";
        }
    }
}
