<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>建立帳號</title>
<?php require("views/script_css.php") ?>
</head>
<body>
     <div>
            <a href="/Project/Home/Index" style="text-decoration:none;">
        		<h1 id="target" class="animated rubberBand">
                    吃飯行事曆
            	</h1>
           	</a>
       	</div>
         <?php if(isset($_SESSION["msg"])){?>
                 <h2><?= $_SESSION["msg"]?></h2>
        <?php unset($_SESSION["msg"]); }?>    
        <table>
       	    <form method="post" action="">
        	    	<tr>
                       	<td scope="col">
                            <label for="txtID">
                            	User ID 
                            </label>
        					<input type="text" name="txtID"
        						   id="txtID" value="<?= $data->userId ?>"
        						   placeholder="請輸入帳號" />
                        </td>
                     </tr>
                     <tr>
                        <td scope="col">
                            <label for="txtPassword">
                            	Password
                            </label> 
        					<input type="password" name="txtPassword" 
        						   id="txtPassword" value="<?= $data->password ?>"
        						   placeholder="請輸入密碼" />
                        </td>
                        </tr>
                        
                        <tr>
                        <td scope="col">
                            <label for="checkPassword">
                            Enter Password Again
                            </label> 
        					<input type="password" name="checkPassword" 
        						   id="checkPassword" value="<?= $data->checkPassword ?>"
        						   placeholder="再輸入一次密碼" />
                        </td>
                        </tr>
        </table>
            <table>
                    <td scope="col">
                        	<input type="submit" name="btnOK" value="OK" />
                    </td>   
                    <td scope="col">
                        	<input type="reset" name="Reset" value="重填" />
                    </td>   
        </form>
                    <td scope="col">
                      	<a href="/Project/Member/Login">
        					<button>取消</button> 
        				</a>
                    </td>
        </table>

</body>
</html>


