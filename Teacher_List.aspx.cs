using System;
using System.Data;
using System.Data.SqlClient;
using System.Web.UI;

public partial class Teacher_List : Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!IsPostBack)
        {
            SqlConnection conn = DB_Connect();
            SqlCommand cmd = new SqlCommand("Select * From Teacher", conn);
            SqlDataReader dr = cmd.ExecuteReader();
            GridView_List.DataSource = dr;
            GridView_List.DataBind();

            dr.Dispose();
            cmd.Dispose();
            conn.Close();
            conn.Dispose();

            Get_DropList();
        }
    }

    private void Get_DropList()
    {
        DataTable list = GetData();
        DropDownList1.DataSource = list;
        DropDownList1.DataTextField = list.Columns["TName"].ToString();
        DropDownList1.DataValueField = list.Columns["TID"].ToString();
        DropDownList1.DataBind();
    }

    protected DataTable GetData()  //取得所有教師資料
    {
        SqlConnection conn = DB_Connect();
        SqlDataAdapter cmd = new SqlDataAdapter("Select TID,TName From Teacher", conn);
        DataTable list = new DataTable();
        cmd.Fill(list);

        cmd.Dispose();
        conn.Close();
        conn.Dispose();

        return list;
    }

    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e) //下拉選單動作
    {
        Teacher_Inf.Text = DropDownList1.SelectedItem.Text + " teacher's students";

        SqlConnection conn = DB_Connect();
        SqlCommand cmd = new SqlCommand("Select SID,Name,Sex,Grade From Student Where TID=@TID", conn);
        cmd.Parameters.Add("@TID", SqlDbType.Int).Value = DropDownList1.SelectedValue;
        SqlDataReader dr = cmd.ExecuteReader();
        Information.DataSource = dr;
        Information.DataBind();

        dr.Dispose();
        cmd.Dispose();
        conn.Close();
        conn.Dispose();
    }
    private static SqlConnection DB_Connect()  //DB連結
    {
        SqlConnection conn = new SqlConnection("Data Source=400-36042696\\SQLEXPRESS;Initial Catalog=testDB;" +
                    "Integrated Security=true;");
        conn.Open();
        return conn;
    }

    protected void Edit_Click(object sender, EventArgs e)
    {
        Session["tid"] = DropDownList1.SelectedValue;
        Response.Redirect("edit.aspx");
    }

    protected void Delete_Click(object sender, EventArgs e)
    {
        SqlConnection conn = DB_Connect();
        SqlCommand saerch = null;
        SqlCommand cmd = null;

        saerch = new SqlCommand("Select * From Student Where TID=@TID;", conn);
        saerch.Parameters.Add("@TID", SqlDbType.Int).Value = DropDownList1.SelectedValue;

        if (saerch.ExecuteScalar() != null)
        {
            saerch = new SqlCommand("Delete * From Student Where TID=@TID;", conn);
            saerch.Parameters.Add("@TID", SqlDbType.Int).Value = DropDownList1.SelectedValue;
            saerch.ExecuteNonQuery();
        }

        try
        {
            cmd = new SqlCommand("Delete From Teacher Where TID=@TID;", conn);
            cmd.Parameters.Add("@TID", SqlDbType.Int).Value = DropDownList1.SelectedValue;
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

            Response.AddHeader("Refresh", "0");
        }
    }
}
