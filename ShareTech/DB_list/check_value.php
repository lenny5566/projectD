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
            $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_NUMBER_INT) : "";
            break;
      }
        return $value;
    }
?>
