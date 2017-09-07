<?php

check_file("book.txt");

if (isset ($_POST['index']) ) {
    $file   = fopen("book.txt", "r");
    print_table($file);
}

if (isset ($_POST['select_1']) || isset ($_POST['select_2']) ) {
    $choose = $_POST['select_1'];
    $sort   = $_POST['select_2'];
    if ($choose == "prize" || $choose == "day") {
        $arr_newdata = sort_data($choose, $sort, 'num');
        write_file($arr_newdata);
        $file   = fopen("book.txt", "r");
        print_table($file);
    } else {
        $arr_newdata = sort_data($choose, $sort);
        write_file($arr_newdata);
        $file   = fopen("book.txt", "r");
        print_table($file);
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
    rename("tmp.txt","book.txt");
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
        if ($row != "") {
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
    }
    echo "</table>";
    fclose($file);
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

function write_file($data)
{
    $tmp   = fopen('sort.txt', 'w');
    foreach ($data as $value) {
        fputcsv($tmp, $value);
    }
    fclose($tmp);
    rename("sort.txt","book.txt");
}
