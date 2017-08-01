<?php

class DBrand
{
    public function RandFood()
    {
            require ("config.php");
            
            //連結資料庫
            $link = mysqli_connect($dbhost,$dbuser,$dbpass);
            mysqli_select_db($link,$dbname);
            mysqli_query($link,"SET names UTF8");
            
            //從foodList取資料總數
            $totalNumber = mysqli_query($link,"select * from foodList");
            $randNum     = mysqli_num_rows($totalNumber);
            
            //亂數取陣列回傳
            $number      = rand(1,$randNum);
            $query       = mysqli_query($link,"select * from foodList where fNo ='$number'");
            $row         = mysqli_fetch_row($query);
            return $row;
    }
}    
?>