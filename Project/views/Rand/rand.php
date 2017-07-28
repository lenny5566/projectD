<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 

<?php require("views/script_css.php") ?>

<title>吃</title>
<script>  
   
     var Submit=function()
     {
            var value = "<?php echo $data[0] ?>";
            alert(value);
     }
     
</script>
</head>
<body>
    <h1 id="target" class="blue-text text-darken-2 animated rubberBand">
        今天吃甚麼好?
    </h1>
    <table>
        <tbody>
            <td scope="col">
                <h3>骰個</h3>
                <img src="/Project/css/images/dice.png" width="200" height="200" onClick="Submit()">
            </td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <td scope="col">
            <h3>不吃了</h3>
               	<a href="/Project/Home/Index">
            	<img src="/Project/css/images/no.png" width="200" height="200">
                </a>
        </td>
        </tbody>
    </table>              
</body>
</html>
