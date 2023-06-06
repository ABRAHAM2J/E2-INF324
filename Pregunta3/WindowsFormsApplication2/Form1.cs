using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using MySql.Data.MySqlClient;
using System.Drawing;
using System.Drawing.Imaging;
using System.Text;
using System.Windows.Forms;



namespace WindowsFormsApplication2
{
    public partial class Form1 : Form
    {
        int cR, cG, cB;

        public Form1()
        {
            InitializeComponent();
        }

        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Color c = new Color();
            int mR, mG, mB;
            mR = 0; mG = 0; mB = 0;

            for (int i = e.X - 5; i < e.X + 5; i++)
                for (int j = e.Y - 5; j < e.Y + 5; j++)
                {
                    c = bmp.GetPixel(i, j);
                    mR = mR + c.R;
                    mG = mG + c.G;
                    mB = mB + c.B;
                }
            mR = mR / 100;
            mG = mG / 100;
            mB = mB / 100;

            textBox1.Text = mR.ToString();
            textBox2.Text = mG.ToString();
            textBox3.Text = mB.ToString();
            cR = mR;
            cG = mG;
            cB = mB;

            MySqlConnection con = new MySqlConnection("server=localhost; port=3306; database=academico; uid=root; password=''");
            MySqlCommand cmd = new MySqlCommand("INSERT INTO colores (descripcion, mR, mG, mB, color) VALUES (@descripcion, @mR, @mG, @mB, @color)", con);
            cmd.Parameters.AddWithValue("@descripcion", textBox4.Text);
            cmd.Parameters.AddWithValue("@mR", mR);
            cmd.Parameters.AddWithValue("@mG", mG);
            cmd.Parameters.AddWithValue("@mB", mB);
            cmd.Parameters.AddWithValue("@color", textBox5.Text);

            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();

            textBox4.Text = "";
            textBox5.Text = "";
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Bitmap bmp;
            openFileDialog1.ShowDialog();
            if (openFileDialog1.FileName != "")
            {
                bmp = new Bitmap(openFileDialog1.FileName);
                pictureBox1.Image = bmp;
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++)
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(c.R, 0, 0));
                }
            pictureBox2.Image = bmp2;
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++)
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(0, c.G, 0));
                }
            pictureBox2.Image = bmp2;
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++)
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(0, 0, c.B));
                }
            pictureBox2.Image = bmp2;
        }

        private void button5_Click(object sender, EventArgs e)
        {
            MySqlConnection con = new MySqlConnection("server=localhost; port=3306; database=academico; uid=root; password=''");
            MySqlCommand cmd = new MySqlCommand("SELECT * FROM colores", con);
            MySqlDataReader dr;

            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            int cR, cG, cB;
            string colorcambio;

            con.Open();
            dr = cmd.ExecuteReader();

            while (dr.Read())
            {
                cR = dr.GetInt32(1);
                cG = dr.GetInt32(2);
                cB = dr.GetInt32(3);
                colorcambio = dr.GetString(4);
                bmp2 = new Bitmap(bmp.Width, bmp.Height);

                for (int i = 0; i < bmp.Width; i++)
                {
                    for (int j = 0; j < bmp.Height; j++)
                    {
                        c = bmp.GetPixel(i, j);

                        if (((cR - 10 < c.R) && (c.R < cR + 10)) && ((cG - 10 < c.G) && (c.G < cG + 10))
                            && ((cB - 10 < c.B) && (c.B < cB + 10)))
                        {
                            int clR = Convert.ToInt32(colorcambio.Substring(0, 2), 16);
                            int clG = Convert.ToInt32(colorcambio.Substring(2, 2), 16);
                            int clB = Convert.ToInt32(colorcambio.Substring(4, 2), 16);
                            

                            bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));

                            /*if (colorcambio == "00DCFF")
                                bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));
                            if (colorcambio == "04FF00")
                                bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));
                            if (colorcambio == "EC9200")
                                bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));*/
                        }
                        else
                        {
                            bmp2.SetPixel(i, j, Color.FromArgb(c.R, c.G, c.B));
                            
                        }
                    }
                }

                bmp = bmp2;
            }

            pictureBox2.Image = bmp2;
            con.Close();

        }

        private void button6_Click(object sender, EventArgs e)
        {
            MySqlConnection con = new MySqlConnection("server=localhost; port=3306; database=academico; uid=root; password=''");
            MySqlCommand cmd = new MySqlCommand("SELECT * FROM colores", con);
            MySqlDataReader dr;

            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            int mmR, mmG, mmB;
            Color c = new Color();

            con.Open();
            dr = cmd.ExecuteReader();

            while (dr.Read())
            {
                int cR = dr.GetInt32(1);
                int cG = dr.GetInt32(2);
                int cB = dr.GetInt32(3);
                string colorcambio = dr.GetString(4);

                for (int i = 0; i < bmp.Width - 10; i += 10)
                {
                    for (int j = 0; j < bmp.Height - 10; j += 10)
                    {
                        mmR = 0; mmG = 0; mmB = 0;
                        for (int k = i; k < i + 10; k++)
                        {
                            for (int l = j; l < j + 10; l++)
                            {
                                c = bmp.GetPixel(k, l);
                                mmR = mmR + c.R;
                                mmG = mmG + c.G;
                                mmB = mmB + c.B;
                            }
                        }

                        mmR = mmR / 100;
                        mmG = mmG / 100;
                        mmB = mmB / 100;

                        if ((cR - 10 < mmR) && (mmR < cR + 10) && (cG - 10 < mmG) && (mmG < cG + 10) && (cB - 10 < mmB) && (mmB < cB + 10))
                        {
                            int clR = Convert.ToInt32(colorcambio.Substring(0, 2), 16);
                            int clG = Convert.ToInt32(colorcambio.Substring(2, 2), 16);
                            int clB = Convert.ToInt32(colorcambio.Substring(4, 2), 16);

                            for (int k = i; k < i + 10; k++)
                            {
                                for (int l = j; l < j + 10; l++)
                                {
                                    bmp2.SetPixel(k, l, Color.FromArgb(clR, clG, clB));

                                    /*if (colorcambio == "00DCFF")
                                        bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));
                                    if (colorcambio == "04FF00")
                                        bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));
                                    if (colorcambio == "EC9200")
                                        bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));*/
                                }
                            }
                        }
                        else
                        {
                            for (int k = i; k < i + 10; k++)
                            {
                                for (int l = j; l < j + 10; l++)
                                {
                                    c = bmp.GetPixel(k, l);
                                    bmp2.SetPixel(k, l, Color.FromArgb(c.R, c.G, c.B));
                                }
                            }
                        }
                    }
                }
                bmp = bmp2;
            }

            pictureBox2.Image = bmp2;
            con.Close();


        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
            textBox1.ReadOnly = true;
        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {
            textBox2.ReadOnly = true;
        }

        private void textBox3_TextChanged(object sender, EventArgs e)
        {
            textBox3.ReadOnly = true;
        }




    }
}
