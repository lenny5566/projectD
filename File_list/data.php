<?php

if (isset ($_POST['index']) ) {
	$data  = file("book.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach ($data as $key => $value) {
		$data[$key] .= ",".$key;
	}
	print_table($data);
}

if (isset ($_POST['select_1']) || isset ($_POST['select_2']) ) {
    $choose = $_POST['select_1'];
    $sort   = $_POST['select_2'];
	$arr    = array();
    $arr_newdata = sort_data($choose, $sort);
	foreach ($arr_newdata as $key => $value) {
		$arr[$key] = implode(",", $value);
	}
	print_table($arr);	
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
		echo "<button> <a href='delete.php?id=".$data_array[6]."'> DEL </a> </button> </td>";
		echo "</tr>";
    }
    echo "</table>";
}

function sort_data($sorttype = 'ISBM', $l = 0)
{
    $arr_data = array();
	$file = ("book.txt");
    $no = 0;
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
		$arr_data[$no]["id"]	 = $no;
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
