<?php

check_file("book.txt");

if (isset ($_POST['index']) ) {
	$data  = file("book.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    print_table($data);
}

if (isset ($_POST['select_1']) || isset ($_POST['select_2']) ) {
    $choose = $_POST['select_1'];
    $sort   = $_POST['select_2'];
    if ($choose == "prize" || $choose == "day") {
        $arr_newdata = sort_data($choose, $sort, 'num');
		data_change($arr_newdata);
    } else {
        $arr_newdata = sort_data($choose, $sort);
		data_change($arr_newdata);
    }
}

function check_file($file)
{
    $data  = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $tmp   = fopen('tmp.txt', 'w');
    foreach ($data as $key => $value) {
        if ($key == 0) {
            fputs($tmp, $value);
        } else {
            fputs($tmp, PHP_EOL.$value);
        }
    }
    fclose($tmp);
	
	$tmp1   = fopen('tmp.txt', 'r');
	$tmp2   = fopen('check.txt', 'w');
    while (!feof ($tmp1) ) {
		$char = fgetc($tmp1);
        if ($char != '"' && $char != ' ') {
            fputs($tmp2, $char);
        }
    }
	fclose($tmp1);
	fclose($tmp2);
	rename("check.txt", "tmp.txt");
    rename("tmp.txt",$file);
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
		$count = $key+1;
		echo "<tr>";
		echo "<td>" . $data_array[0] . "</td>";
		echo "<td>" . $data_array[1] . "</td>";
		echo "<td>" . $data_array[2] . "</td>";
		echo "<td>" . $data_array[3] . "</td>";
		echo "<td>" . $data_array[4] . "</td>";
		echo "<td>" . $data_array[5] . "</td>";
		echo "<td> <button> <a href='edit.php?id=".$count."'> EDIT </a> </button>";
		echo "&nbsp";
		echo "<button> <a href='delete.php?id=".$count."'> DEL </a> </button> </td>";
		echo "</tr>";
    }
    echo "</table>";
}

function sort_data($sorttype = 'ISBM', $l = 0, $s = 'str')
{
    $arr_data = array(); 
    $file = ("book.txt");
    $no = 1;
    $file_data = file_get_contents($file); 
    $data_array = explode("\n", $file_data); 
    foreach ($data_array as $key => $value) {
        $data = explode(",", $value);
        $arr_data[$no]["ISBM"]   = $data[0];
        $arr_data[$no]["press"]  = $data[1];
        $arr_data[$no]["name"]   = $data[2];
        $arr_data[$no]["author"] = $data[3];
        $arr_data[$no]["prize"]  = $data[4];
        $arr_data[$no]["day"]    = $data[5];
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
    return $arr_data;
}

function data_change($data) 
{
	$arr    = array();
	$no		= 0;
	foreach ($data as $key => $value) {
		foreach ($value as $i => $j) {
			if ($i == 'ISBM') {
				$arr[$no] = $j;
			} else {
				$arr[$no] .= ",".$j;
			}
		}
		$no++;
	}
	print_table($arr);
}
