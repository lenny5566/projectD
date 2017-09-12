<?php

include("class/db.php");

$db = new DataBase;
$query = $db->query("SELECT * FROM `book` WHERE id = '2'");
foreach ($query->result() as $row) {
    echo $row->id.'<br/>';
	echo $row->press.'<br/>';
}
