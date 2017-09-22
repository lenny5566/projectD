<?php
	include("xhtml/check_value.html");
    //過濾資料格式
	
    function get_Value($value, $type) 
    {
	  switch ($type) {
		case "string":
			$value = ($value != "") ? filter_var($value, FILTER_SANITIZE_STRIPPED) : "";
			break;
		case "int":
			$value = ($value != "") ? filter_var($value, FILTER_SANITIZE_NUMBER_INT) : "";
			break;
	  }
		$value = addslashes($value);
		return $value;
    }
?>
