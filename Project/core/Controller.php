<?php

class Controller {
    public function model($model) {
        require_once "models/$model.php";
        return new $model ();
    }

    public function view($view, $data = Array(), $data2 = Array()) 
    {
        require_once "views/$view.php";
    }

}

?>