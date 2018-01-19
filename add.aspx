<%@ Page Language="C#" AutoEventWireup="true" CodeFile="add.aspx.cs" Inherits="Test_List_add" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div id="header">
            <h1>Add List</h1>
        </div>
        <div>
            <h3>Teacher's</h3>
                ID <br/> <asp:TextBox ID="TID" runat="server"></asp:TextBox> <br/>
                Name <br/> <asp:TextBox ID="TName" runat="server"></asp:TextBox> <br/>
                Phone <br/> <asp:TextBox ID="TPhone" runat="server"></asp:TextBox> <br/>
                Subject <br/> <asp:TextBox ID="TSubject" runat="server"></asp:TextBox> <br/>
                Sex <br/> <asp:TextBox ID="TSex" runat="server"></asp:TextBox> <br/>
        </div>
        <div>
            <asp:Button ID="Add" runat="server" Text="OK" OnClick="Add_Click" />  &nbsp;
            <input id="Back" onclick="location.href='Teacher_List.aspx'" type="button" value="Back" />
        </div>
     </form>
</body>
</html>
