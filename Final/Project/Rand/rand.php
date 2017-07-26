<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
<script type="text/javascript" src="jquery.min.js"></script>
<?php require("../MainStyle.php") ?>

<title>吃</title>
<script>  
   
     var Submit=function()
     {
           var URLs="test2.php";
            $.ajax({
                url: URLs,
                dataType:'text',

                success: function(msg){
                    alert(msg);
                },
                 error:function(xhr, ajaxOptions, thrownError){ 
                    alert(xhr.status); 
                    alert(thrownError); 
                 }
            });
     }
</script>
</head>
<body>
    <h1>嗨</h1>
    <table>
        <tbody>
        <td scope="col">
                 <button id="back" type="button"
                         onmouseover="this.className='over';"
                         onmouseout="this.className='';"
                         onClick="Submit()">
                            <p>骰個</p>
                 </button>
        </td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <td scope="col">
                <a href="../main2.php" target="_blank">
                <button id="back" type="button"
                        onmouseover="this.className='over';"
                        onmouseout="this.className='';">
                            <p>不吃了</p>
                </button>
                </a>
        </td>
        </tbody>
    </table>
</body>
</html>
 