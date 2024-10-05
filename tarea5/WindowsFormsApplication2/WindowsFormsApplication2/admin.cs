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
    public partial class admin : Form
    {
        DataSet ds = new DataSet();
        SqlDataAdapter ada = new SqlDataAdapter();
        public admin()
        {
            InitializeComponent();
        }

        private void admin_Load(object sender, EventArgs e)
        {
            datos();
            if (dataGridView1.Columns["Eliminar"] == null)
            {
                DataGridViewButtonColumn btnDelete = new DataGridViewButtonColumn();
                btnDelete.Name = "Eliminar";
                btnDelete.HeaderText = "Eliminar";
                btnDelete.Text = "Eliminar";
                btnDelete.UseColumnTextForButtonValue = true;
                dataGridView1.Columns.Add(btnDelete);
            }
        }
        private void datos() {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=bd_catastro;Integrated Security=True;";
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select id_per, nombre, paterno, materno, direccion from personas";
            ada.SelectCommand.CommandType = CommandType.Text;


            ada.Fill(ds, "personas");
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "personas";
        }
        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            if (e.RowIndex >= 0)
            {
                if (dataGridView1.Columns[e.ColumnIndex] is DataGridViewButtonColumn && e.RowIndex >= 0)
                {
                    int userId = Convert.ToInt32(dataGridView1.Rows[e.RowIndex].Cells["id_per"].Value);

                    DialogResult result = MessageBox.Show("¿Estás seguro de que deseas eliminar este usuario?", "Confirmar eliminación", MessageBoxButtons.YesNo);
                    if (result == DialogResult.Yes)
                    {
                        EliminarUsuario(userId);
                        
                    }
                }
                else
                {
                    int userId = Convert.ToInt32(dataGridView1.Rows[e.RowIndex].Cells["id_per"].Value);
                    userdetalle userDetallesForm = new userdetalle(userId);
                    userDetallesForm.Show();
                }
            }
        }

        private void EliminarUsuario(int userId)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=bd_catastro;Integrated Security=True;";
            con.Open();

            SqlTransaction transaction = con.BeginTransaction(); 

            SqlCommand cmd1 = new SqlCommand();
            cmd1.Connection = con;
            cmd1.Transaction = transaction;
            cmd1.CommandText = "DELETE FROM propiedades WHERE id_per=@id_per";
            cmd1.Parameters.AddWithValue("@id_per", userId);

            SqlCommand cmd2 = new SqlCommand();
            cmd2.Connection = con;
            cmd2.Transaction = transaction;
            cmd2.CommandText = "DELETE FROM usuario WHERE id_per=@id_per";
            cmd2.Parameters.AddWithValue("@id_per", userId);

            try
            {
                cmd1.ExecuteNonQuery();

                cmd2.ExecuteNonQuery();
                transaction.Commit();
                label2.Text = "Usuario eliminado correctamente.";
                ds.Clear();
                datos();

              
            }
            catch (Exception ex)
            {
                
                transaction.Rollback();
                label2.Text = "Error al eliminar: " + ex.Message;
            }
           

        }
        private void button1_Click(object sender, EventArgs e)
        {
            agregarpersonas agregarpersonasForm = new agregarpersonas();
            agregarpersonasForm.Show();
            this.Close();
        }
    }
}
