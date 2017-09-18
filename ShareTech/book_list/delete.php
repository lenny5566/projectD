<?php

    include("class/db.php");
	
    if (isset ($_GET['id']) ) {
		$count  = $_GET["id"];
		$db 	= new DataBase;
		$query  = $db->query("DELETE FROM `book` where id = '$count'");
		header("Location: index.php");
    }
