using System;
using System.Data;
using System.Data.SqlClient;
using System.Web.UI;

public partial class Test_List_edit : Page
{
    protected void Add_Click(object sender, EventArgs e)
    {
        SqlConnection conn = new SqlConnection("Data Source=400-36042696\\SQLEXPRESS;Initial Catalog=testDB;" +
                    "Integrated Security=true;");
        SqlCommand cmd = null;
        try
        {
            conn.Open();
            cmd = new SqlCommand("Update Teacher Set TName=@TName,TPhone=@TPhone," +
                "TSubject=@TSubject,TSex=@TSex Where TID=@TID", conn);
            cmd.Parameters.Add("@TID", SqlDbType.Int).Value = Session["tid"];
            cmd.Parameters.Add("@TName", SqlDbType.NChar, 10).Value = TName.Text;
            cmd.Parameters.Add("@TPhone", SqlDbType.NVarChar, 20).Value = TPhone.Text;
            cmd.Parameters.Add("@TSubject", SqlDbType.NChar, 10).Value = TSubject.Text;
            cmd.Parameters.Add("@TSex", SqlDbType.NChar, 10).Value = TSex.Text;
            cmd.ExecuteNonQuery();
        }
        catch (Exception ex)
        {
            Response.Write(ex.ToString());
        }
        finally
        {
            cmd.Dispose();
            conn.Close();
            conn.Dispose();

            Response.Redirect("Teacher_List.aspx");
        }
    }
}