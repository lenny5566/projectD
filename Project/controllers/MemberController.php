<?php

class MemberController extends Controller 
{
    
    function Login()        //帳號登入,呼叫postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")   //確認訪問的方法是POST
        {
            $this->postLogin();
            exit();
        }
        $this->view("Member/Login");
    }
    
     function Member()     //帳號註冊,呼叫Create()
    {
       if ($_SERVER['REQUEST_METHOD'] == "POST")   //確認訪問的方法是POST
        {
            $this->Create();
            exit();
        }
        $this->view("Member/Member");
    }

    function Create()       //建立帳號
    {
        $userModel = $this->model("User");      //檢查帳號是否存在
        if ($userModel->isLoginPass()) 
        {                                                           //回到member頁，顯示訊息
            $userModel->msg = "已經有人註冊了!換一個吧!@@";  
            $_SESSION["msg"] = $userModel->msg;
            header("Location: /Project/Member/Member");
        }
        else 
        {   
            $createModel = $this->model("Account");     
            $result = $createModel->CreateMember();
            if ($result == "true")                                  //帳號建立結果
            {                                                       //回到login頁，顯示成功訊息
               $createModel->msg = "帳號建立成功!用新帳號登入吧!";  
               $_SESSION["msg"] = $createModel->msg;
               header("Location: /Project/Member/Login");
            }
            else if($result == "wrong") 
            {                                                       //回到member頁，顯示錯誤訊息
               $createModel->msg = "輸入有誤喔!請重新輸入!";      
               $_SESSION["msg"] = $createModel->msg;
               header("Location: /Project/Member/Member");
            }
            else
            {                                                       //回到member頁，顯示錯誤訊息
               $createModel->msg = "建立帳號失敗!QAQ 再試一次吧";   
               $_SESSION["msg"] = $createModel->msg;
               header("Location: /Project/Member/Member");
            }
        }
    }
    
    function postLogin()        //帳號登入
    {
        $userModel = $this->model("User");
        if ($userModel->isLoginPass())                      //檢查帳號 
        {                                                   //回到login頁，顯示成功訊息
            $_SESSION["mId"] = $userModel->mID; 
            $_SESSION["userId"] = $userModel->userId;
            header("Location: /Project/Home/Index");
        }
        else 
        {                                                   //回到login頁，顯示錯誤訊息
            $userModel->msg = "帳號好像不對耶...再試一次";
            $_SESSION["msg"] = $userModel->msg;
            header("Location: /Project/Member/Login");
        }
    }
    
    function Logout()        //帳號登出
    {
        unset($_SESSION["userId"]);        //清除SESSION值
        unset($_SESSION["mId"]);
        unset($_SESSION["msg"]);
        header("Location: /Project/Home/Index");    //回到首頁
    }
    
}

?>
