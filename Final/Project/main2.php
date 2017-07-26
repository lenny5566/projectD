<!doctype html>
<html>
<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <meta charset="UTF-8">
    <?php require("MainStyle.php") ?>
</head>

<body>
        <table>
           <caption>
               <div id="target" class="animated rubberBand">
                    <h1  class="blue-text text-darken-2">
                        吃飯行事曆
                    </h1>
                </div>
            </caption>
            <tbody>
                <tr>
                    <td scope="col">
                        <h3>骰一個</h3>
                        <a href="Rand/rand.php" target="_blank">
                            <img src="main/red-dice-icon.gif" width="200" height="200">
                        </a> 
                    </td>
                    
                    <td scope="col">
                        <h3>登入</h3>
                        <a href="NewCalendar/drag.php" target="_blank">
                            <img src="main/write.gif" width="200" height="200">
                        </a> 
                    </td>
                </tr>

            </tbody>
        </table>
    
</body>
</html>
