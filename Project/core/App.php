<?php

class App 
{
    public function __construct() 
    {
        $url = $this->parseUrl();
        
        $controllerName = "{$url[0]}Controller";
        require_once "controllers/$controllerName.php";
        $controller = new $controllerName;
        $methodName = $url[1];
        unset($url[0]);                         
        unset($url[1]);
        $params = $url ? array_values($url) : Array();             //確認url還有沒有值，有就放入陣列 
        call_user_func_array(Array($controller, $methodName), $params); //動態調用函式
    }
        
    public function parseUrl()  
    {
        $urlArray = Array();
        if (isset($_GET["url"]))     //判斷$_GET有沒有值
        {
            $url = rtrim($_GET["url"], "/");    //去除url右側的'/'
            $urlArray = explode("/", $url);     //以'/'分割url，並存入陣列
        }
        
        if (count($urlArray) < 2)   
        {
            $urlArray = Array("Home", "Index");
        }
        return $urlArray;
    }
}

?>
