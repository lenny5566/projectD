<?php

    require("check_value.php");
    require ("config.php");
    if (isset ($_POST["action"] ) && ($_POST["action"] == "edit" )) {
            $sql_query = "UPDATE list SET name=?, gender=?, phone=?, birthday=?, address=?, email=?
                        WHERE id=?";
            $stmt = $db_link->prepare($sql_query);
            $stmt->bind_param("sissssi",
                get_sqlValue($_POST["name"], 'string'),
                $_POST["gender"],
                get_sqlValue($_POST["phone"], 'string'),
                get_sqlValue($_POST["birthday"], 'string'),
                get_sqlValue($_POST["address"], 'string'),
                get_sqlValue($_POST["email"], 'string'),
                get_sqlValue($_POST["id"], 'int') );
            $stmt->execute();
            $stmt->close();
            $db_link->close();
            header("Location: edit.php?editStats=1");
    }
    $id = $_GET["id"];
    $query_Record = "SELECT * FROM list WHERE id='$id' ";
    $Record = $db_link->query($query_Record);
    $row_Record = $Record->fetch_assoc();
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
                <?php if (isset ($row_Record["gender"]) && $row_Record["gender"] == "0") { ?>
                    <input name="gender" type="radio" value="0" checked>Female
                    <input name="gender" type="radio" value="1">Male
                <?php } else { ?>
                    <input name="gender" type="radio" value="0">Female
                    <input name="gender" type="radio" value="1" checked>Male
                <?php } ?> </p>
            <p><strong>Phone</strong>：
                <input name="phone" type="text" class="input" id="phone" value="<?php echo $row_Record["phone"]; ?>"> </p>
            <p><strong>birthday</strong>：
                <input name="birthday" type="text" class="input" id="birthday" value="<?php echo $row_Record["birthday"]; ?>">
            <p><strong>Address</strong>：
                <input name="address" type="text" class="input" id="address" value="<?php echo $row_Record["address"]; ?>"> </p>
            <p><strong>E-mail</strong>：
                <input name="email" type="text" class="input" id="email" value="<?php echo $row_Record["email"]; ?>"> </p>

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
