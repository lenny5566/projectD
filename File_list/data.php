<?php

$arr_data = array();
$arr_data = read_data("book.txt");

if (isset ($_POST['index']) ) {
    $file   = fopen("book.txt", "r");
    print_table($file);
}

if (isset ($_POST['select_1']) || isset ($_POST['select_2']) ) {
    $choose = $_POST['select_1'];
    $sort   = $_POST['select_2'];
	
    if ($choose == "prize" || $choose == "day") {
        $arr_newdata = sort_data($choose, $sort, 'num');
        foreach ($arr_newdata as $key => $value) {
            
        }
	    print_r($arr_newdata);
    } else {
        $arr_newdata = sort_data($choose, $sort);
        foreach ($arr_newdata as $key => $value) {
            
        }
	    print_r($arr_newdata);
    }
}

function read_data($filestr)
{
    global $arr_data; 
    $no = 1;
    $tmp_data = file_get_contents($filestr); 
    $tmp_array = explode("\n", $tmp_data); 
    foreach ($tmp_array as $key => $value) {
        $data = explode(",", $value);
        if ($key > 0) {
            $arr_data[$no][$item1] = $data[0];
            $arr_data[$no][$item2] = $data[1];
            $arr_data[$no][$item3] = $data[2];
            $arr_data[$no][$item4] = $data[3];
            $arr_data[$no][$item5] = $data[4];
            $arr_data[$no][$item6] = $data[5];
            $no++;
        } else {
           $item1 = "ISBM";
           $item2 = "press";
           $item3 = "name";
           $item4 = "author";
           $item5 = "prize";
           $item6 = "day";
       }
    }
    return $arr_data;
}

function print_table($file)
{
    $count = 1;
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
    while (!feof ($file) ) {
        $row = fgetcsv($file);  //fgetcsv 從檔案指標取得行並且剖析CSV欄位 語法：fgetcsv(檔案指標,讀取長度,分隔符號)
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "<td> <button> <a href='edit.php?id=".$count."'> EDIT </a> </button>";
        echo "&nbsp";
        echo "<button> <a href='delete.php?id=".$count."'> DEL </a> </button> </td>";
        echo "</tr>";
        
        $count++;
    }
    echo "</table>";
    fclose($file);
}

function sort_data($sorttype = 'ISBM', $l = 0, $s = 'str')
{
    global $arr_data;
    $tmp_arr = array();
    $tmp_data = array();
    foreach($arr_data as $key => $value)
    {
        $get_d = $value[$sorttype];
        $tmp_data[$key] = $s=='str' ? $get_d.'' : $get_d+0;
    }
    
    if ($l) {
        arsort($tmp_data);
    } else {
        asort($tmp_data);
    }

    foreach ($tmp_data as $key => $d) {
        $tmp_arr[$key] = $arr_data[$key];
    }
    return $tmp_arr;
}
