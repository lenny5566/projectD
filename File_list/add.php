<?php
    if ($_FILES["file"]["error"] > 0) {
        echo "Error! ";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"],"input.txt") ) {
            $input = fopen("input.txt", "r");
            $file  = fopen("book.txt", "a");
            fputs($file, PHP_EOL); //換行
            while ($list = fgets($input) ) {
                fputs($file, $list);
            }
            fclose($input);
            fclose($file);
            header("Location: list.php");
        }
    }
?>