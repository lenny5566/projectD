<?php

class MemberController extends Controller {
    
    function Login() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->postLogin();
            exit();
        }
        $this->view("Member/Login");
    }
    
    function postLogin() {
        $userModel = $this->model("User");
        if ($userModel->isLoginPass()) {
            $_SESSION["userId"] = $userModel->userId;
            header("Location: /Project/Home/Index");
        }
        else {
            $this->view("Member/Login", $userModel);
        }
    }
    
    function Logout() {
        unset($_SESSION["userId"]);
        header("Location: /Project/Home/Index");
    }
    
}

?>
