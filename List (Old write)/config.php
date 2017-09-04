<?php
	
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'contact_list';
	
	$db_link = mysql_connect($db_host, $db_user, $db_pass) or die('Error with MySQL connection');
	mysql_query("SET NAMES 'utf8' ");
	mysql_select_db($db_name, $db_link);
?>
