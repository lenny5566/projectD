<!DOCTYPE html>
<html>
<head>
<?php require("script_css.php") ?>
<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#btn').click(function ()
        {
            $.ajax({
                url: 'data.php',
                cache: false,
                dataType: 'html',
                type: 'post',
                data: {
                	select: $("#select").find(":selected").val(),
                	string: $('#string').val()
                 },
                success: function(response)
                {
                    $('#msg').html(response);
                    $('#msg').fadeIn();
                    $('#string').val('');
                }
            });
        });
    });
</script>
</head>
<body>
    <h1>Contact List</h1>
    <h2>List View</h2>
    <hr>
    <div>Search:
            <select id="select">
                <option value="0" selected>Selected</option>
                <option value="1">All</option>
                <option value="name">Name</option>
                <option value="gender">Gender</option>
                <option value="phone">Phone</option>
                <option value="birthday">Birthday</option>
                <option value="address">Address</option>
                <option value="email">E-mail</option>
            </select>
            <input id="string" type="text">
            <input id="btn" type="submit" value="Search">
    </div>
    <br>
    <div id="msg"></div>
    <hr>
    <div style="text-align:center;">
        <button>
            <a href="add.php">Add Record</a>
        </button>
    </div>
</body>
</html>
