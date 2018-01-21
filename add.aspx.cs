using System;
using System.Data;
using System.Data.SqlClient;
using System.Web.UI;

public partial class Test_List_add : Page
{
    string Msg = ""; 
    protected void Add_Click(object sender, EventArgs e)
    {
        if (CheckForm() == false) {
            Response.Write("<script>alert('" + Msg + "')</script>");
        } else {
            InsertData();
        }
    }

    protected bool CheckForm()
    {
        if (string.IsNullOrEmpty(TID.Text))
        {
            Msg = "Please enter TID!";
            return false;
        }

        if (string.IsNullOrEmpty(TName.Text))
        {
            Msg = "Please enter TName!";
            return false;
        }

        if (string.IsNullOrEmpty(TPhone.Text))
        {
            Msg = "Please enter TPhone!";
            return false;
        }

        if (string.IsNullOrEmpty(TSubject.Text))
        {
            Msg = "Please enter TSubject!";
            return false;
        }

        if (string.IsNullOrEmpty(TSex.Text))
        {
            Msg = "Please enter TSex!";
            return false;
        }

        return true;
    }

    private void InsertData()
    {
        SqlConnection conn = new SqlConnection("Data Source=400-36042696\\SQLEXPRESS;Initial Catalog=testDB;" +
                            "Integrated Security=true;");
        SqlCommand cmd = null;
        try
        {
            conn.Open();
            cmd = new SqlCommand("Insert Into Teacher (TID,TName,TPhone,TSubject,TSex) values " +
                "(@TID,@TName,@TPhone,@TSubject,@TSex)", conn);
            cmd.Parameters.Add("@TID", SqlDbType.Int).Value = TID.Text;
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