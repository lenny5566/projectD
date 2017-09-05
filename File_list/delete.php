<?php

    if (isset ($_POST["action"] ) && ($_POST["action"] == "delete" )) {
        $file  = fopen("book.txt", "r+");
        while ($list = fgets($input) ) {
            fputs($file, $list);
        }
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
    <h1>Delete List</h1>
    <h2>Sure Delete?</h2>
            <form action="" method="POST" name="formDelete" id="formDelete">
            <p align="center">
                <input name="action" type="hidden" id="action" value="delete">
                <input type="submit" name="Submit2" value="YES">
                <input type="button" name="Submit" value="NO" onClick="window.history.back();">
            </p>
            </form>
</body>
</html>
