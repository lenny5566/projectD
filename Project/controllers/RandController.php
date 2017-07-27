<?php

class RandController extends Controller {
    
    function Rand() {
        $randModel = $this->model("DBrand");
        $row = $randModel->RandFood();
        $this->view("Rand/rand", $row);
    }
}

?>
