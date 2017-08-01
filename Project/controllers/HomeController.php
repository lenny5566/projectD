<?php

class HomeController extends Controller 
{
    function Index()    //首頁
    {
        unset($_SESSION["msg"]);
        $this->view("Home/Index");
    }
    
    function Rand()     //亂數
    {
        $randModel = $this->model("DBrand");  
        $row = $randModel->RandFood();
        $this->view("Home/Rand", $row);
    }
}

?>
