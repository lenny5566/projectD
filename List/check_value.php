<script language="javascript">
function checkForm()
{
	if (document.formJoin.name.value == "") {		
		alert("Please enter Name!");
		document.formJoin.name.focus();
		return false;
	}
	
	if (document.formJoin.phone.value == "") {
		alert("Please enter Phone!");
		document.formJoin.phone.focus();
		return false;
	}
	
	if (document.formJoin.birthday.value == "") {
		alert("Please enter Birthday!");
		document.formJoin.birthday.focus();
		return false;
	}
	
	if (document.formJoin.address.value == "") {
		alert("Please enter Address!");
		document.formJoin.address.focus();
		return false;
	}
	
	if (document.formJoin.email.value == "") {
		alert("Please enter E-mail!");
		document.formJoin.email.focus();
		return false;
	}
	
	if (!check_mail (document.formJoin.email) ) {
		document.formJoin.email.focus();
		return false;}
		
	return confirm('Sure send data?');
}

function check_mail(email) 
{
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(email.value) ) {
		return true;
	}
	alert("E-mail type is't correct!");
	return false;
}
</script>

<?php
    //過濾資料格式
    function get_sqlValue($value, $type) 
    {
      switch ($type) {
        case "string":
            $value = ($value != "") ? filter_var($value, FILTER_SANITIZE_STRIPPED) : "";
            break;
        case "int":
            $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_NUMBER_INT) : "";
            break;
        case "email":
            $value = ($value != "") ? filter_var($value, FILTER_VALIDATE_EMAIL) : "";
            break;
      }
        return $value;
    }
?>
