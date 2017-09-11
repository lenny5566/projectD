<?php
    require("check_value.php");

	$count = "";
    if (isset ($_GET["id"] ) ) {
        $count = $_GET["id"];
        $row_Record = array();
        $file     = fopen("book.txt", "r");
		$line_no  = 0;
		while (!feof ($file) ) {
			$line = fgetcsv($file);
			if ($line_no == $count) {
				$row_Record = $line;
			}
			$line_no++;
		}
    }

    if (isset ($_POST["action"] ) && ($_POST["action"] == "edit" )) {
        $num      = get_Value($_POST["num"], 'string');
	    $press    = get_Value($_POST["press"], 'string');
        $name     = get_Value($_POST["name"], 'string');
        $author   = get_Value($_POST["author"], 'string');
        $prize    = get_Value($_POST["prize"], 'int');
        $day      = get_Value($_POST["day"], 'int');
        $row      = $num.",".$press.",".$name.",".$author.",".$prize.",".$day."\n";
		$file     = fopen("book.txt", "r");
        $tmp_file = fopen("tmp.txt", "w");
        $line_no  = 0;
        while (!feof ($file) ) {
            $line = fgets($file);
            if ($line_no == $count) {
                fputs($tmp_file, $row);
            } else {
                fputs($tmp_file, $line);
            }
            $line_no++;
        }
        fclose($file);
        fclose($tmp_file);
        rename("tmp.txt","book.txt");
		check_file("book.txt");
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
                <input name="num" type="text" class="input" id="num" value="<?php echo $row_Record[0]; ?>"> </p>
            <p><strong>出版社</strong>：
                <input name="press" type="text" class="input" id="press" value="<?php echo $row_Record[1]; ?>"> </p>
            <p><strong>書名</strong>：
                <input name="name" type="text" class="input" id="name" value="<?php echo $row_Record[2]; ?>"> </p>
            <p><strong>作者</strong>：
                <input name="author" type="text" class="input" id="author" value="<?php echo $row_Record[3]; ?>"> </p>
            <p><strong>定價</strong>：
                <input name="prize" type="text" class="input" id="prize" value="<?php echo $row_Record[4]; ?>"> </p>    
            <p><strong>發行日</strong>：
                <input name="day" type="text" class="input" id="day" placeholder="YYYY-MM-DD" value="<?php echo $row_Record[5]; ?>">
            <hr size="1" />
            <p align="center">
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
