<?php

include("class/db.php");

$page = intval($_POST['pageNum']);
if (isset ($_POST['select_1']) || isset ($_POST['select_2']) ) {
    $choose = $_POST['select_1'];
    $sort   = $_POST['select_2'];
}
$db   = new DataBase;

$result = mysql_query("SELECT * FROM book");
$total  = mysql_num_rows($result);//總記錄數

$pageSize = 16; //每頁顯示數
$totalPage = ceil($total/$pageSize); //總頁數

$startPage = $page*$pageSize;
$arr['total'] = $total;
$arr['pageSize'] = $pageSize;
$arr['totalPage'] = $totalPage;

if ($sort == 0) { //asc
	$query = mysql_query("SELECT * FROM (SELECT * FROM book LIMIT $startPage, $pageSize) t ORDER BY $choose ASC");
} else { //desc
	$query = mysql_query("SELECT * FROM (SELECT * FROM book LIMIT $startPage, $pageSize) t ORDER BY $choose DESC");
}

while ($row = mysql_fetch_array($query)) {
	$arr['list'][] = array(
		'ISBN' => $row['ISBN'],
		'press' => $row['press'],
		'bName' => $row['bName'],
		'author' => $row['author'],
		'prize' => $row['prize'],
		'day' => $row['day'],
		'id' => $row['id'],
	);
}
echo json_encode($arr);
