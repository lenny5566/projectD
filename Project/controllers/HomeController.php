<?php

class HomeController extends Controller {
    
    function Index() {
        $this->view("Home/Index");
    }
    
    function Rand()
    {
        $randModel = $this->model("DBrand");
        $row = $randModel->RandFood();
        $this->view("Home/Rand", $row);
    }

}

?>
