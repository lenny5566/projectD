<?php
	
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'contact_list';
	
	$db_link = new mysqli($db_host, $db_user, $db_pass, $db_name);
	if ($db_link->connect_error != "") {
		echo "Database connect error!";
	}
	
	$db_link->query("SET NAMES 'utf8' ");
?>
