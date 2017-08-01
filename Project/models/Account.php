<?php

class Account 
{
    public $userId;
    public $password;
    public $checkPassword;
    public $msg;
    
    public function CreateMember()  //建立帳號
    {
        $result = "true";
        $erro = "";
        require ("config.php");
       
        $link = mysqli_connect($dbhost,$dbuser,$dbpass);
        mysqli_select_db($link,$dbname);
        mysqli_query($link,"SET names UTF8");
        
        $this->userId       = $_POST ["txtID"];
    	$this->password      = $_POST ["txtPassword"];
    	$this->checkPassword     = $_POST ["checkPassword"];
      
        if($this->userId != null && 		$this->password    != null &&              //判斷帳號密碼是否為空值
           $this->checkPassword != null && $this->password == $this->checkPassword)     //確認密碼輸入的正確性
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
                    $result = "false";
                    return $result;
                }
        }
        else
        {   
            $result = "wrong";
            return $result;
        }
                
    }
}
    
?>
