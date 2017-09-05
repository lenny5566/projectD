<?php

if (isset ($_POST['select_1']) && isset ($_POST['select_2']) ) {
    $choose = $_POST['select_1'];
    $string = $_POST['select_2'];
    $file = fopen("book.txt", "r");

    if ($choose == "1") {
        print_table($file);
    } elseif ($choose == "2") {
        print_table($result);
    } else {
        print_table($result);
    }
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
