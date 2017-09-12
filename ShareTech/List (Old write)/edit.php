<?php

    require("check_value.php");
    require ("config.php");
    if (isset ($_POST["action"] ) && ($_POST["action"] == "edit" )) {
            $id       = $_POST["id"];
            $name     = get_sqlValue($_POST["name"], 'string');
    	    $gender   = $_POST["gender"];
	        $phone    = get_sqlValue($_POST["phone"], 'string');
	        $birthday = get_sqlValue($_POST["birthday"], 'int');
	        $address  = get_sqlValue($_POST["address"], 'string');
	        $email    = get_sqlValue($_POST["email"], 'email');
            mysql_query("UPDATE list SET name='$name', gender='$gender', phone='$phone', birthday='$birthday', address='$address', email='$email'
                        WHERE id='$id'");

            header("Location: edit.php?editStats=1");
    }
    $id = $_GET["id"];
    $query_Record = "SELECT * FROM list WHERE id='$id' ";
    $Record = mysql_query($query_Record);
    $row_Record = mysql_fetch_assoc($Record);
?>
<!DOCTYPE html>
<html>
<head>
<?php require("script_css.php") ?>
</head>
<body>
    <h1>Edit List</h1>
        <table>
        <tr valign="top">
        <td class="tdrline">
            <form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
            <p><strong>Name</strong>：
                <input name="name" type="text" class="input" id="name" value="<?php echo $row_Record["name"]; ?>"> </p>
            <p><strong>Gender</strong>：
                <?php if (isset ($row_Record["gender"]) && $row_Record["gender"] == "Female") { ?>
                    <input name="gender" type="radio" value="Female" checked>Female
                    <input name="gender" type="radio" value="Male">Male
                <?php } else { ?>
                    <input name="gender" type="radio" value="Female">Female
                    <input name="gender" type="radio" value="Male" checked>Male
                <?php } ?> </p>
            <p><strong>Phone</strong>：
                <input name="phone" type="text" class="input" id="phone" placeholder="xxxx-xxxxxx" value="<?php echo $row_Record["phone"]; ?>"> </p>
            <p><strong>birthday</strong>：
                <input name="birthday" type="text" class="input" id="birthday" placeholder="YYYY-MM-DD" value="<?php echo $row_Record["birthday"]; ?>">
            <p><strong>Address</strong>：
                <input name="address" type="text" class="input" id="address" value="<?php echo $row_Record["address"]; ?>"> </p>
            <p><strong>E-mail</strong>：
                <input name="email" type="text" class="input" id="email" placeholder="xxx@xxx.xxx.xx" value="<?php echo $row_Record["email"]; ?>"> </p>

            <hr size="1" />
            <p align="center">
                <input name="id" type="hidden" value="<?php echo $row_Record["id"]; ?>">
                <input name="action" type="hidden" id="action" value="edit">
                <input type="submit" name="Submit2" value="Ok">
                <input type="reset" name="Submit3" value="Reset">
                <input type="button" name="Submit" value="Last Page" onClick="window.history.back();">
            </p>
            </form>
        </td>
        </tr>
        </table>

        <?php if (isset ($_GET["editStats"]) && ($_GET["editStats"] == "1") ) { ?>
            <script language="javascript">
                alert('Record Update Succuess!');
                window.location.href='list.php';
            </script>
        <?php } ?>
</body>
</html>
