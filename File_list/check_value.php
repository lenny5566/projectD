<script language="javascript">
function checkForm()
{
	if (document.formJoin.num.value == "") {		
		alert("Please enter ISBN!");
		document.formJoin.num.focus();
		return false;
	}
	
	if (document.formJoin.press.value == "") {
		alert("Please enter Press!");
		document.formJoin.press.focus();
		return false;
	}
	
	if (document.formJoin.name.value == "") {
		alert("Please enter Book name!");
		document.formJoin.name.focus();
		return false;
	}
	
	if (document.formJoin.author.value == "") {
		alert("Please enter Author!");
		document.formJoin.author.focus();
		return false;
	}
	
	if (document.formJoin.prize.value == "") {
		alert("Please enter Prize!");
		document.formJoin.prize.focus();
		return false;
	}

	if (document.formJoin.day.value == "") {
		alert("Please enter Day!");
		document.formJoin.day.focus();
		return false;
	}
	
	if (!check_day(document.formJoin.day) ) {
		document.formJoin.day.focus();
		return false;
	}
	return confirm('Sure send data?');
}

function check_day(day)
{
	var filter  = /^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[0-1])$/;
	if (filter.test(day.value) ) {
		return true;
	}
	alert("Day type isn't correct!");
	return false;
}

</script>

<?php
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
