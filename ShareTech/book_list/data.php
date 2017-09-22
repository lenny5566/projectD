<?php

include("class/db.php");
$db   = new DataBase;
$page = intval($_POST['pageNum']);

if (isset ($_POST['sort']) ) {
	if ($_POST['sort'] == 1) {
		$choose = 'ISBN';
		$sort   = 0;
	} else {
		$str = explode(':', $_POST['sort']);
		$choose = $str[0];
		$sort   = $str[1];
	}
}

$result = "SELECT * FROM book";
$total  = $db->number_query($result);//總記錄數

$pageSize  = 16; //每頁顯示數
$totalPage = ceil($total/$pageSize); //總頁數

$startPage = $page*$pageSize;
$arr['total'] 	  = $total;
$arr['pageSize']  = $pageSize;
$arr['totalPage'] = $totalPage;

if ($sort == 0) { //asc
	$query = $db->query("SELECT * FROM (SELECT * FROM book LIMIT $startPage, $pageSize) t ORDER BY $choose ASC");
} else { //desc
	$query = $db->query("SELECT * FROM (SELECT * FROM book LIMIT $startPage, $pageSize) t ORDER BY $choose DESC");
}

foreach ($query as $row) {
	$data = "";
	if (!empty($row->phone) && !empty($row->address) ) {
		$data = $row->phone."<br>".$row->address;
	}

	$arr['list'][] = array(
		'ISBN'   => $row->ISBN,
		'press'  => $row->press,
		'bName'  => $row->bName,
		'author' => $row->author,
		'prize'  => $row->prize,
		'day' 	 => $row->day,
		'id' 	 => $row->id,
		'p_data' => $data
	);
}
echo json_encode($arr);
