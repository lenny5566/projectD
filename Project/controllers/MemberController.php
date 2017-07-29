<?php

class MemberController extends Controller 
{
    
    function Login() {
        if ($_SERVER['REQUEST_METHOD'] == "POST")   //確認訪問的方法是POST
        {
            $this->postLogin();
            exit();
        }
        $this->view("Member/Login");
    }
    
     function Member() 
    {
       if ($_SERVER['REQUEST_METHOD'] == "POST")   //確認訪問的方法是POST
        {
            $this->Create();
            exit();
        }
        $this->view("Member/Member");
    }

    function Create()
    {
        $userModel = $this->model("Account");
        $result    = $userModel->CreateMember();
        if ($result) 
        {
           $msg = "建立帳號成功!";
           echo $msg;
           $this->view("Member/Login",1, $msg);
        }
        else if($result == "wrong") 
        {
           $msg = "輸入有誤喔!請重新輸入";
           echo $msg;
           $this->view("Member/Member",1, $$msg);
        }
        else if($result == "exisit") 
        {
           $msg = "已經有人註冊了!@@";
           echo $msg;
           $this->view("Member/Member",1, $$msg);
        }
        else
        {
           $msg = "建立帳號失敗!QAQ";
           echo $msg;
           $this->view("Member/Member",1, $$msg);
        }
    }
    
    function postLogin() 
    {
        $userModel = $this->model("User");
        if ($userModel->isLoginPass()) 
        {
            $_SESSION["mId"] = $userModel->mID; 
            $_SESSION["userId"] = $userModel->userId;
            header("Location: /Project/Home/Index");
        }
        else {
            $this->view("Member/Login", $userModel);
        }
    }
    
    
    function Logout() 
    {
        unset($_SESSION["userId"]);
        unset($_SESSION["mId"]);
        header("Location: /Project/Home/Index");
    }
    
}

?>
