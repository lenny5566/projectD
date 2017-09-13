<?php
    require("check_value.php");
	include("class/db.php");

    if (isset ($_GET["id"] ) ) {
        $count  = $_GET["id"];
		$db 	= new DataBase;
		$row_Record = array();
		$query  = $db->query("SELECT * FROM `book` where id = '$count'");
		$data = $query->result();
		if (empty($data) ) {	
			header("Location: message.php");
		}
		foreach ($data as $row) {
			$row_Record["ISBN"]   = $row->ISBN;
			$row_Record["press"]  = $row->press;
			$row_Record["bName"]  = $row->bName;
			$row_Record["author"] = $row->author;
			$row_Record["prize"]  = $row->prize;
			$row_Record["day"]    = $row->day;
			$row_Record["id"]	  = $row->id;
		}
    }

    if (isset ($_POST["action"] ) && ($_POST["action"] == "edit" )) {
		$id     = $_POST["id"];
	    $press  = get_Value($_POST["press"], 'string');
        $name   = get_Value($_POST["name"], 'string');
        $author = get_Value($_POST["author"], 'string');
        $prize  = get_Value($_POST["prize"], 'int');
        $day    = get_Value($_POST["day"], 'int');
        $db 	= new DataBase;
		$query  = $db->query("UPDATE `book` SET press='$press', bName='$name',
							author='$author', prize='$prize', day='$day' WHERE id='$id'");
        header("Location: list.php");
    }
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
            <p><strong>ISBN</strong>：
                <input name="num" type="text" class="input" id="num" value="<?php echo $row_Record["ISBN"]; ?>" readonly="readonly"> </p>
            <p><strong>出版社</strong>：
                <input name="press" type="text" class="input" id="press" value="<?php echo $row_Record["press"]; ?>"> </p>
            <p><strong>書名</strong>：
                <input name="name" type="text" class="input" id="name" value="<?php echo $row_Record["bName"]; ?>"> </p>
            <p><strong>作者</strong>：
                <input name="author" type="text" class="input" id="author" value="<?php echo $row_Record["author"]; ?>"> </p>
            <p><strong>定價</strong>：
                <input name="prize" type="text" class="input" id="prize" value="<?php echo $row_Record["prize"]; ?>"> </p>
			<label for="day"><strong>發行日</strong>：</label>
				<input type="date" name="day" class="input" id="day" placeholder="YYYY-MM-DD" value="<?php echo $row_Record["day"]; ?>">
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
</body>
</html>
