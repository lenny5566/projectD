<?php
    require("check_value.php");
    require ("config.php");
    // 確認新增的人是否已經存在
    if (isset ($_POST["action"] ) && ($_POST["action"] == "add" )) {
        $query_name = "SELECT name FROM list WHERE name = '{$_POST["name"]}'";
        $query      = $db_link->query($query_name);
        if ($query->num_rows > 0) {
    		header("Location: add.php?errMsg=1&name={$_POST["name"]}");
    	} else {
            $sql_query = "INSERT INTO list (name, gender, phone, birthday, address, email)
                        VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $db_link->prepare($sql_query);
            $stmt->bind_param("sissss",
                get_sqlValue($_POST["name"], 'string'),
                $_POST["gender"],
                get_sqlValue($_POST["phone"], 'string'),
                get_sqlValue($_POST["birthday"], 'string'),
                get_sqlValue($_POST["address"], 'string'),
                get_sqlValue($_POST["email"], 'string') );
            $stmt->execute();
            $stmt->close();
            $db_link->close();
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
                <input name="gender" type="radio" value="0" checked>Female
                <input name="gender" type="radio" value="1">Male
            <p><strong>Phone</strong>：
                <input name="phone" type="text" class="input" id="phone"></p>    
            <p><strong>birthday</strong>：
                <input name="birthday" type="text" class="input" id="birthday">
            <p><strong>Address</strong>：
                <input name="address" type="text" class="input" id="address"></p>
            <p><strong>E-mail</strong>：
                <input name="email" type="text" class="input" id="email"></p>    
         
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
