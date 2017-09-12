<?php
    require("check_value.php");
    require ("config.php");
    // 確認新增的人是否已經存在
    if (isset ($_POST["action"] ) && ($_POST["action"] == "add" )) {
        $query_name = "SELECT name FROM list WHERE name = '{$_POST["name"]}'";
        $query      = mysql_query($query_name);
        if (mysql_num_rows($query) > 0) {
    		header("Location: add.php?errMsg=1&name={$_POST["name"]}");
    	} else {
    	    $name     = get_sqlValue($_POST["name"], 'string');
    	    $gender   = $_POST["gender"];
	        $phone    = get_sqlValue($_POST["phone"], 'string');
	        $birthday = get_sqlValue($_POST["birthday"], 'int');
	        $address  = get_sqlValue($_POST["address"], 'string');
	        $email    = get_sqlValue($_POST["email"], 'email');
            mysql_query("INSERT INTO list (name, gender, phone, birthday, address, email)
                        VALUES ('$name', '$gender', '$phone', '$birthday', '$address', '$email')");
            header("Location: add.php?addStats=1");
    	}
    }
?>
<!DOCTYPE html>
<html>
<head>
<?php require("script_css.php") ?>
</head>
<body>
    <h1>Add List</h1>
        <table>
        <tr valign="top">
        <td class="tdrline">
            <form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
        		<?php if (isset ($_GET["errMsg"]) && ($_GET["errMsg"] == "1") ) { ?>
                    <div class="errDiv"> <?php echo $_GET["name"]; ?> is exisit！</div>
                <?php } ?>
            <p><strong>Name</strong>：
                <input name="name" type="text" class="input" id="name">
            <p><strong>Gender</strong>：
                <input name="gender" type="radio" value="Female" checked>Female
                <input name="gender" type="radio" value="Male">Male
            <p><strong>Phone</strong>：
                <input name="phone" type="text" class="input" id="phone" placeholder="xxxx-xxxxxx"></p>    
            <p><strong>birthday</strong>：
                <input name="birthday" type="text" class="input" id="birthday" placeholder="YYYY-MM-DD">
            <p><strong>Address</strong>：
                <input name="address" type="text" class="input" id="address"></p>
            <p><strong>E-mail</strong>：
                <input name="email" type="text" class="input" id="email" placeholder="xxx@xxx.xxx.xx"></p>    
         
            <hr size="1" />
            <p align="center">
                <input name="action" type="hidden" id="action" value="add">
                <input type="submit" name="Submit2" value="Ok">
                <input type="reset" name="Submit3" value="Reset">
                <input type="button" name="Submit" value="Last Page" onClick="window.history.back();">
            </p>
            </form>
        </td>
        </tr>
        </table>

        <?php if (isset ($_GET["addStats"]) && ($_GET["addStats"] == "1") ) { ?>
            <script language="javascript">
                alert('Add Record Succuess!');
                window.location.href='list.php';
            </script>
        <?php } ?>
</body>
</html>
