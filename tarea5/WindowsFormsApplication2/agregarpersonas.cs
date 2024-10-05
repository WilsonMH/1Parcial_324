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
    public partial class agregarpersonas : Form
    {
        DataSet ds = new DataSet();
        SqlDataAdapter ada = new SqlDataAdapter();
        public agregarpersonas()
        {
            InitializeComponent();
        }

        private void agregarpersonas_Load(object sender, EventArgs e)
        {

        }

        private void textBox6_TextChanged(object sender, EventArgs e)
        {

        }

        private void label7_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            string username = textBox1.Text;
            string password = textBox2.Text;
            string nombre = textBox3.Text;
            string paterno = textBox4.Text;
            string materno = textBox5.Text;
            string direccion = textBox7.Text;
            string ci = textBox6.Text;
            int rol = 2;

            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=bd_catastro;Integrated Security=True;";
            SqlCommand cmd = new SqlCommand();
            cmd.Connection = con;
            cmd.CommandText = "INSERT INTO personas (nombre, paterno, materno, direccion, usuario, clave, rol) VALUES (@nombre, @paterno, @materno, @direccion, @username, @password, @rol_id)";

            
            cmd.Parameters.AddWithValue("@nombre", nombre);
            cmd.Parameters.AddWithValue("@paterno", paterno);
            cmd.Parameters.AddWithValue("@materno", materno);
            cmd.Parameters.AddWithValue("@direccion", direccion);
            cmd.Parameters.AddWithValue("@username", username);
            cmd.Parameters.AddWithValue("@password", password);
            
            cmd.Parameters.AddWithValue("@rol_id", rol);
            cmd.CommandType = CommandType.Text;
            con.Open();
            try
            {
                cmd.ExecuteNonQuery();
                MessageBox.Show("Usuario Registro insertado exitosamente.");
                admin adminForm = new admin();
                adminForm.Show();
                this.Close();

            }
            catch (Exception ex)
            {
                MessageBox.Show("Error al insertar el registro: " + ex.Message);
            }



        }
    }
}
