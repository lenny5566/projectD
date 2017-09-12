<?php

	require("check_value.php");
	
	if (isset ($_GET["check"] )) {
		$file_check = filemtime("book.txt");
		if ($file_check > $_GET["check"]) {
			header("Location: message.php");
		}
	}

    if (isset ($_POST["action"] ) && ($_POST["action"] == "delete" )) {
        if (isset ($_GET["id"] ) ) {
            $count = $_GET["id"];
        }
        $file     = fopen("book.txt", "r");
        $tmp_file = fopen("tmp.txt",'w');
        $line_no  = 0;
        while (!feof ($file) ) {
            $line = fgets($file);
            if ($line_no != $count) {
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
