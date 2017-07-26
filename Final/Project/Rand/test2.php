<?php
   $dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'FinalProject';
  
    $link=mysql_connect($dbhost,$dbuser,$dbpass);
    mysql_select_db($dbname,$link);
    mysql_query("SET names UTF8");
        $num = rand(1,5);

    $query = mysql_query("select * from foodList where fNo ='$num'");
    $row=mysql_fetch_row($query);
    echo $row[0];

?>