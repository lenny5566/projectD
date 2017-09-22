<?php
    require("check_value.php");
	include("class/db.php");

    if (isset ($_GET["id"] ) ) {
        $count  = $_GET["id"];
		$db 	= new DataBase;
		$row_Record = array();
		$query  = $db->query("SELECT * FROM `book` where id = '$count'");
		if (empty($query) ) {
			header("Location: xhtml/message.html");
		}
		foreach ($query as $row) {
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
		$db->query("UPDATE `book` SET press='$press', bName='$name',
				author='$author', prize='$prize', day='$day' WHERE id='$id'");
        header("Location: index.php");
    }
	
	require("xhtml/edit.html");
