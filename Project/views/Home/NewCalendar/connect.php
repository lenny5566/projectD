<?php
$host="localhost";
$db_user="root";
$db_pass="";
$db_name="FinalProject";
$timezone="Asia/Taipei";

$link=mysql_connect($host,$db_user,$db_pass);   //資料庫連線
mysql_select_db($db_name,$link);
mysql_query("SET names UTF8");

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone);   //設定時區
?>
