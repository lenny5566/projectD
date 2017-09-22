<?php

include("class/db.php");
$string = "";
$db   	= new DataBase;

if (isset ($_GET['sort']) ) {
	if ($_GET['sort'] == 1) {
		$choose = 'ISBN';
		$sort   = 0;
	} else {
		$str = explode(':', $_GET['sort']);
		$choose = $str[0];
		$sort   = $str[1];
	}
}

if ($sort == 0) { //asc
	$query = $db->query("SELECT * FROM book ORDER BY $choose ASC");
} else { //desc
	$query = $db->query("SELECT * FROM book ORDER BY $choose DESC");
}

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
