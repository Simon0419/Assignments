/*
 * Student Name: Liang Yulu
 * Student ID: 103242
 * Login Name: yulul
 */ 

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using MySql.Data.MySqlClient;
using System.Data;


namespace yululAssignment2
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    
    public enum Alliance { Worgen, Dreanei, Dwarf, Gnome, Human, NightElf }//the enum for race.

    public partial class MainWindow : Window
    {
        static string connectionString = "Database=yulul;Data Source=alacritas.cis.utas.edu.au;User Id=yulul;Password=103242";
        public DataSet dataStore = new DataSet();
        public MySqlConnection dsConn;
        public MySqlDataAdapter dataAdapter;
        public bool checkName;//to check if name is exist. If so, then return true.
        public int max;//the int value for the number of current charactors.

        public MainWindow()
        {
            InitializeComponent();

            dsConn = new MySqlConnection(connectionString);
            dsConn.Open();

        }

        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            dataGrid_Load();//after loaded the window, called this method to get the table value from database.
        }

        //the method to be called to reload the table from database and sorted it.
        private void dataGrid_Load()
        {

            dataAdapter = new MySqlDataAdapter("select * from rpg_Editor order by name", dsConn);
            dataStore.Clear();
            dataAdapter.Fill(dataStore);
            dataGrid.ItemsSource = dataStore.Tables[0].DefaultView;
            dataGrid.SelectedValuePath = "name";
            raceBox.ItemsSource = Enum.GetValues(typeof(Alliance));
        }

        //the method to check the number of current charactors.
        private void checkNum()
        {
            max = 0;
            using (MySqlCommand maxCmd = new MySqlCommand("select count(*) from rpg_Editor", dsConn))
            {
                using (MySqlDataReader rdr = maxCmd.ExecuteReader())
                {
                    if (rdr.Read())
                        max = rdr.GetInt16(rdr.GetOrdinal("count(*)"));
                }
            }
        }


        //the delete method to delete the charactor from database based on the name user choose.
        private void deleteData(object sender, RoutedEventArgs e)
        {

            using (MySqlCommand deleteCmd = new MySqlCommand("delete from rpg_Editor where name = ?name", dsConn))
            {
                deleteCmd.Parameters.AddWithValue("?name", dataGrid.SelectedValue);

                deleteCmd.ExecuteNonQuery();
            }
            dataGrid_Load();
        }

        //the method to show the selected value in text box.
        private void passValues(object sender, MouseButtonEventArgs e)
        {
            checkNum();
            //to check if selected value in the range of list then pass the value to text box.
            if (dataGrid.SelectedIndex >= 0 && dataGrid.SelectedIndex < max)
            {
                DataRowView mySelectedElement = (DataRowView)dataGrid.SelectedItem;

                nameBox.Text = mySelectedElement.Row[0].ToString();
                raceBox.SelectedIndex = (int)Enum.Parse(typeof(Alliance), mySelectedElement.Row[1].ToString());
                strengthBox.Text = mySelectedElement.Row[2].ToString();
                intelligenceBox.Text = mySelectedElement.Row[3].ToString();
                healthBox.Text = mySelectedElement.Row[4].ToString();
            }
        }

        //the method to empty text box then user can enter the new charactor.
        private void newData(object sender, RoutedEventArgs e)
        {
            nameBox.Text = "";
            raceBox.SelectedIndex = 0;
            strengthBox.Text = "";
            intelligenceBox.Text = "";
            healthBox.Text = "";
        }

        //the method to submit the data after the user changed or added the charactor in text box.
        private void submitData(object sender, RoutedEventArgs e)
        {
            checkName = false;//initial the checkname value;
            //if user enter any value or char then to check if the name is exist.
            if (nameBox.Text.Length > 0)
            {
                using (MySqlCommand checkCmd = new MySqlCommand("select * from rpg_Editor where name = ?name", dsConn))
                {
                    checkCmd.Parameters.AddWithValue("?name", nameBox.Text);
                    using (MySqlDataReader rdr = checkCmd.ExecuteReader())
                    {
                        if (rdr.Read())
                            checkName = true;//if name is exits in current database, then checkname becomes true.
                    }
                }

                //if the name is exist, then user can edit the attribute.
                //if not, then insert a new charactor.
                if (checkName)
                {

                    using (MySqlCommand updataCmd = new MySqlCommand("update rpg_Editor set race = ?race, strength = ?strength, intelligence = ?intelligence, health = ?health  where name = ?name", dsConn))
                    {
                        updataCmd.Parameters.AddWithValue("?name", nameBox.Text);
                        updataCmd.Parameters.AddWithValue("?race", raceBox.SelectedValue.ToString());
                        updataCmd.Parameters.AddWithValue("?strength", strengthBox.Text);
                        updataCmd.Parameters.AddWithValue("?intelligence", intelligenceBox.Text);
                        updataCmd.Parameters.AddWithValue("?health", healthBox.Text);

                        updataCmd.ExecuteNonQuery();
                    }
                    dataGrid_Load();
                }
                else
                {
                    using (MySqlCommand insertCmd = new MySqlCommand("insert into rpg_Editor (name, race, strength, intelligence, health) values (?name, ?race, ?strength, ?intelligence, ?health)", dsConn))
                    {
                        insertCmd.Parameters.AddWithValue("?name", nameBox.Text);
                        insertCmd.Parameters.AddWithValue("?race", raceBox.SelectedValue.ToString());
                        insertCmd.Parameters.AddWithValue("?strength", strengthBox.Text);
                        insertCmd.Parameters.AddWithValue("?intelligence", intelligenceBox.Text);
                        insertCmd.Parameters.AddWithValue("?health", healthBox.Text);

                        insertCmd.ExecuteNonQuery();
                    }
                    dataGrid_Load();
                }
            }
        }

        //the method to close the WPF.
        private void closeEditor(object sender, RoutedEventArgs e)
        {
            dsConn.Close();
            Close();
        }
    }
}
