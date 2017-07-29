<?php

class Account 
{
    
    public $userId;
    public $password;
    public $checkPassword;
 
    public function CreateMember()
    {
        $result = true;
        $erro = "";
        require ("config.php");
       
        $link = mysqli_connect($dbhost,$dbuser,$dbpass);
        mysqli_select_db($link,$dbname);
        mysqli_query($link,"SET names UTF8");
        
        $this->userId       = $_POST ["txtID"];
    	$this->password      = $_POST ["txtPassword"];
    	$this->checkPassword     = $_POST ["checkPassword"];
            //判斷帳號密碼是否為空值
            //確認密碼輸入的正確性
         $check = mysqli_query($link,"select * from `member` where id = '$this->userId'");
            $checkNum  = mysqli_num_rows($check);
            if($checkNum == 0)
            { 
        if($this->userId != null && 		$this->password    != null &&
           	$this->checkPassword != null && $this->password == $this->checkPassword)
        {
           
                $this->md5Password = md5 ( $this->password );
               //新增資料進資料庫語法
                $sql = "insert into `member` (id, password) values ('$this->userId', '$this->md5Password')";
                if(mysqli_query($link,$sql))
                {
                     return $result;
                }
                else
                {
                    $result = false;
                    return $result;
                }
         
        }
        else
        {   
            $erro = "wrong";
            return $erro;
        }
                   
            }
            else
            {
                $erro = "exisit";
                return $erro;
            }
    }
}
    
?>
