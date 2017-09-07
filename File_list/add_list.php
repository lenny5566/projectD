<?php
    require("check_value.php");

    if (isset ($_POST["action"] ) && ($_POST["action"] == "add" )) {
        $num      = get_Value($_POST["num"], 'string');
	    $press    = get_Value($_POST["press"], 'string');
        $name     = get_Value($_POST["name"], 'string');
        $author   = get_Value($_POST["author"], 'string');
        $prize    = get_Value($_POST["prize"], 'int');
        $day      = get_Value($_POST["day"], 'int');
        $row      = "\n".$num.",".$press.",".$name.",".$author.",".$prize.",".$day;
        $file     = fopen("book.txt", "a");
        fputs($file, $row);
        fclose($file);
        header("Location: list.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
<?php require("script_css.php") ?>
</head>
<body>
    <h1>ADD List</h1>
        <table>
        <tr valign="top">
        <td class="tdrline">
            <form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
            <p><strong>ISBN</strong>：
                <input name="num" type="text" class="input" id="num"> </p>
            <p><strong>出版社</strong>：
                <input name="press" type="text" class="input" id="press"> </p>
            <p><strong>書名</strong>：
                <input name="name" type="text" class="input" id="name"> </p>
            <p><strong>作者</strong>：
                <input name="author" type="text" class="input" id="author"> </p>
            <p><strong>定價</strong>：
                <input name="prize" type="text" class="input" id="prize"> </p>    
            <p><strong>發行日</strong>：
                <input name="day" type="text" class="input" id="day" placeholder="YYYY-MM-DD">
            <hr size="1" />
            <p align="center">
                <input name="action" type="hidden" id="action" value="add">
                <input type="submit" name="Submit2" value="Ok">
                <input type="reset"  name="Submit3" value="Reset">
                <input type="button" name="Submit" value="Last Page" onClick="window.history.back();">
            </p>
            </form>
        </td>
        </tr>
        </table>
</body>
</html>
