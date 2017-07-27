<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
<script type="text/javascript" src="jquery.min.js"></script>
<?php require("views/script_css.php") ?>

<title>吃</title>
<script>  
   
     var Submit=function()
     {
            var value="<?php echo $data[0]; ?>";
            alert(value);
     }
</script>
</head>
<body>
    <h1>嗨</h1>
     <div id="labPage" data-role="page" data-theme="d">
    <div data-role="header" data-position="fixed">
        <div data-role="navbar">
        <table>
            <tbody>
            <td scope="col">
                    <h3>骰個</h3>
                    <img src="/Project/css/images/red-dice-icon.gif" width="200" height="200" onClick="Submit()">
            </td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <td scope="col">
                    <h3>不吃了</h3>
                   	<a href="/Project/Home/Index" data-icon="home" data-theme="b" data-ajax="false">
                    	<img src="/Project/css/images/no.jpg" width="200" height="200">
                    </a>
            </td>
            </tbody>
        </table>              
        </div>
    </div>
    </div>
</body>
</html>
