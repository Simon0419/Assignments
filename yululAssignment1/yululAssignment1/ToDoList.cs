/*
 * @Student Name: Liang Yulu
 * @Login Name: yulul
 * @Student ID: 103242
 * @Last Modified: 25/09/2011
 * 
 * @Describe: To Do List form to show the selected program from tbl_todolist.
 *            datetimepicker can be selected from 21/07/2010 to 23/07/2010 and show those days' program.
 *            Delete button to delete all selected cells.
 *            close button to close this form and disconnect the database.
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
    public partial class ToDoList : Form
    {
        MySqlConnection conn;
        DataTable table = new DataTable();
        MySqlDataAdapter dataAdapter;
        MySqlCommandBuilder commandBuilder;

        //to connect the my database.
        public ToDoList()
        {
            InitializeComponent();

            conn = new MySqlConnection("Database=yulul;Data Source=alacritas.cis.utas.edu.au;User Id=yulul;Password=103242");
            conn.Open();
        }

        //to close the current window and disconnect the database.
        private void closeClick(object sender, EventArgs e)
        {
            conn.Close();
            Close();
        }

        //to delete the selected cells and update it.
        private void deleteProgram(object sender, EventArgs e)
        {
            var deleteCommand = new MySqlCommand("delete from tbl_ToDoList where title = ?title and starttime = ?starttime", conn);
            deleteCommand.Parameters.AddRange(new MySqlParameter[]{
                                                          new MySqlParameter() { ParameterName = "?title", SourceColumn = "title", },
                                                          new MySqlParameter() { ParameterName = "?starttime", SourceColumn = "starttime", }});
            dataAdapter.DeleteCommand = deleteCommand;

            //to delete all selected cells but empty cell.
            foreach (DataGridViewRow r in programView.SelectedRows)
            {
                if (!r.IsNewRow)
                {
                    programView.Rows.Remove(r);
                }
            }

            //update the table.
            dataAdapter.Update(table);
            table.Clear();
            dataAdapter.Fill(table);
        }

        //load method to search table from tbl_todolist and set datetime in 21/07/2010.
        private void ToDoList_Load(object sender, EventArgs e)
        {
            dataAdapter = new MySqlDataAdapter("select * from tbl_ToDoList", conn);
            commandBuilder = new MySqlCommandBuilder(dataAdapter);
            dataAdapter.Fill(table);

            dateTimePicker.Value = dateTimePicker.MinDate;

        }

        //to display the table as required as user pick date time.
        private void displayProgram(object sender, EventArgs e)
        {
            DateTime chosenDate = dateTimePicker.Value;

            //to search the table based on the order of day.
            var searchCmd = new MySqlCommand("select * from tbl_ToDoList where date_format(starttime, '%d') = ?starttime order by starttime", conn);
            searchCmd.Parameters.AddWithValue("?starttime", chosenDate.Day.ToString());
            dataAdapter.SelectCommand = searchCmd;

            //update the table.
            dataAdapter.Update(table);
            table.Clear();
            dataAdapter.Fill(table);

            //based on the requirement to choose the column and format.
            programView.DataSource = table;
            programView.Columns[1].Visible = false;
            programView.Columns[2].Visible = false;
            programView.Columns[4].ValueType = typeof(DateTime);
            programView.Columns[4].DefaultCellStyle.Format = "HH:mm";
        }
    }
}
