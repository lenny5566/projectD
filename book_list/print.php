<?php

include("class/db.php");
$string = "";
$db   	= new DataBase;
$query  = $db->query("SELECT * FROM book");

foreach ($query as $key => $row) {
	if ($key == 0) {
		$string .= $row->ISBN.",".
				   $row->press.",".
				   $row->bName.",".
				   $row->author.",".
				   $row->prize.",".
				   $row->day;
	} else {
		$string .= PHP_EOL.
				   $row->ISBN.",".
				   $row->press.",".
				   $row->bName.",".
				   $row->author.",".
				   $row->prize.",".
				   $row->day;
	}
}

$load_time = date("Y-m-d");
header("Content-type: text/x-csv; charset=utf-8");
header("Content-Disposition: filename=".$load_time.".csv");
echo $string;
