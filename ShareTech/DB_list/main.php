<html>
<head>
<script type="text/javascript">
function disp_confirm()
{
	if (confirm("Sure delete?") ) {
		document.write("You pressed OK!")
	} else {
		document.write("You pressed Cancel!")
	}
}
</script>
</head>
<body>
	<input type="button" onclick="disp_confirm()" value="DEL" />
</body>
</html>