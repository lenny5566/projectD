<?php

include("class/db.php");

if (isset ($_POST['index']) ) {
	$arr_newdata = sort_data("ISBN", 0);
	print_table($arr_newdata);
}

if (isset ($_POST['select_1']) || isset ($_POST['select_2']) ) {
    $choose = $_POST['select_1'];
    $sort   = $_POST['select_2'];
    $arr_newdata = sort_data($choose, $sort);
	print_table($arr_newdata);	
}

if (isset ($_GET['load']) ) {
	$load_time = date("Y-m-d");
	header("Content-type: text/x-csv; charset=utf-8");
	header("Content-Disposition: filename=".$load_time.".csv");
	$data_file = file("tmp.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	echo "\xEF\xBB\xBF";
	foreach ($data_file as $key => $value) {
		$data_array = explode(",", $value);
		if ($key != 0) {
			echo PHP_EOL;
		}
		echo $data_array[0];
		for ($i = 1; $i < 6; $i++) {
			echo ",".$data_array[$i];
		}
	}
}

function print_table($data)
{
	echo "<table>
        <tr>
            <th>ISBN</th>
            <th>出版社</th>
            <th>書名</th>
            <th>作者</th>
            <th>定價</th>
            <th>發行日</th>
            <th>編輯/刪除</th>
        </tr>";
    foreach ($data as $key => $value) {
		$data_array = explode(",", $value);
		echo "<tr>";
		echo "<td>" . $data_array[0] . "</td>";
		echo "<td>" . $data_array[1] . "</td>";
		echo "<td>" . $data_array[2] . "</td>";
		echo "<td>" . $data_array[3] . "</td>";
		echo "<td>" . $data_array[4] . "</td>";
		echo "<td>" . $data_array[5] . "</td>";
		echo "<td> <button> <a href='edit.php?id=".$data_array[6]."'> EDIT </a> </button>";
		echo "&nbsp";
		echo "<button> <a href='delete.php?id=".$data_array[6]."' onClick='return check_delete();'> DEL </a> </button> </td>";
		echo "</tr>";
    }
    echo "</table>";
}

function sort_data($sorttype, $l)
{
	$no 	     = 0;
    $arr_data    = array();
	$arr_newdata = array();
	$file   = fopen("tmp.txt", "w");
	$db 	= new DataBase;
	$query  = $db->query("SELECT * FROM `book`");
	foreach ($query->result() as $row) {
        $arr_data[$no]["ISBN"]   = $row->ISBN;
        $arr_data[$no]["press"]  = $row->press;
        $arr_data[$no]["name"]   = $row->bName;
        $arr_data[$no]["author"] = $row->author;
        $arr_data[$no]["prize"]  = $row->prize;
        $arr_data[$no]["day"]    = $row->day;
		$arr_data[$no]["id"]	 = $row->id;
        $no++;
    }

	if ($l == 0) { //asc
		usort($arr_data, function ($a, $b) use ($sorttype) {
					return strnatcmp($a[$sorttype], $b[$sorttype]);
				}
		);
	} else { //desc
		usort($arr_data, function ($a, $b) use ($sorttype) {
					return strnatcmp($b[$sorttype], $a[$sorttype]);
				}
		);
	}
	foreach ($arr_data as $key => $value) {
		$line = implode(",", $value);
		fwrite($file, $line.PHP_EOL);
		$arr_newdata[$key] = $line;
	}
	fclose($file);
    return $arr_newdata;
}
