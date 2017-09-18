<?php
    require("check_value.php");
	require("class/db.php");
    if (isset ($_POST["action"] ) && ($_POST["action"] == "add" )) {
        $num    = get_Value($_POST["num"], 'string');
	    $press  = get_Value($_POST["press"], 'string');
        $name   = get_Value($_POST["name"], 'string');
        $author = get_Value($_POST["author"], 'string');
        $prize  = get_Value($_POST["prize"], 'int');
        $day    = get_Value($_POST["day"], 'int');
        $db 	= new DataBase;
		$db->query("INSERT INTO `book` (ISBN, press, bName, author, prize, day)
                    VALUES ('$num', '$press', '$name', '$author', '$prize', '$day')");
        header("Location: index.php");
    }

	require("xhtml/add_list.html");
