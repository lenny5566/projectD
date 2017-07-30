<?php

class MemberController extends Controller 
{
    
    function Login() 
    {
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
        $userModel = $this->model("User");
        if ($userModel->isLoginPass()) 
        {
            $userModel->msg = "已經有人註冊了!換一個吧!@@";
            $_SESSION["msg"] = $userModel->msg;
            header("Location: /Project/Member/Member");
        }
        else 
        {   
            $createModel = $this->model("Account");
            $result = $createModel->CreateMember();
            if ($result == "true") 
            {
               $createModel->msg = "帳號建立成功!用新帳號登入吧!";
               $_SESSION["msg"] = $createModel->msg;
               header("Location: /Project/Member/Login");
            }
            else if($result == "wrong") 
            {
               $createModel->msg = "輸入有誤喔!請重新輸入!";
               $_SESSION["msg"] = $createModel->msg;
               header("Location: /Project/Member/Member");
            }
            else
            {
               $createModel->msg = "建立帳號失敗!QAQ 再試一次吧";
               $_SESSION["msg"] = $createModel->msg;
               header("Location: /Project/Member/Member");
            }
           
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
            $userModel->msg = "帳號好像不對耶...再試一次";
            $_SESSION["msg"] = $userModel->msg;
            header("Location: /Project/Member/Login");
        }
    }
    
    
    function Logout() 
    {
        unset($_SESSION["userId"]);
        unset($_SESSION["mId"]);
        unset($_SESSION["msg"]);
        header("Location: /Project/Home/Index");
    }
    
}

?>
