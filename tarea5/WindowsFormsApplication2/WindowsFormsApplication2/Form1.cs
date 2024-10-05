using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Text;
using System.Windows.Forms;


namespace WindowsFormsApplication2
{
    public partial class Form1 : Form
    {
        DataSet ds = new DataSet();
        SqlDataAdapter ada = new SqlDataAdapter();
        public Form1()
        {
            InitializeComponent();
        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();

            con.ConnectionString = "server=(local);database=bd_catastro;Integrated Security=True;";
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;

            string usuario = textBox1.Text;
            string password = textBox2.Text;
            ada.SelectCommand.CommandText = "SELECT rol FROM personas WHERE usuario = @usuario AND clave = @password";
            ada.SelectCommand.CommandType = CommandType.Text;


            ada.SelectCommand.Parameters.AddWithValue("@usuario", usuario);
            ada.SelectCommand.Parameters.AddWithValue("@password", password);
            con.Open();
            SqlDataReader reader = ada.SelectCommand.ExecuteReader();
            int userId = 0;

            if (reader.HasRows)
            {
                while (reader.Read()) 
                {
                    userId = reader.GetInt32(0);
                }
                if (userId == 1)
                {
                    admin adminForm = new admin();
                    adminForm.Show();
                    this.Hide();
                }
                else if (userId == 2)
                {
                    usuario usuarioForm = new usuario(userId);
                    usuarioForm.Show();
                    this.Hide();
                }
            }
            else
            {
                MessageBox.Show("Usuario o contraseña incorrectos");
            }
        }
    }
}
