<?php

class User {
    
    public $userId;
    public $password;

    public function isLoginPass() {
        $result = true;
        
        require ("config.php");

    	$this->userId = $_POST ["txtID"];
    	$this->password = $_POST ["txtPassword"];
    	$this->md5Password = md5 ( $this->password );
    
    	$db = new PDO ( "mysql:host=$dbhost;dbname=$dbname;port=3306", $dbuser, $dbpass );
    	$db->exec ( "set names utf8" );
    
    	$stmt = $db->prepare("select * from member where id = :id and password = :password");
    	$stmt->bindValue(':id', $this->userId, PDO::PARAM_STR);
    	$stmt->bindValue(':password', $this->md5Password, PDO::PARAM_STR);
    	$stmt->execute();
    
    	$row = $stmt->fetch();
    	$db = null;
	
	    $result = ($row) ? true : false;
        return $result;
    }

}

?>