<?php
//執行http驗證帳號密碼
header("Content-type: text/html; charset=utf-8");

if (empty($_SERVER['PHP_AUTH_USER'])) {

header('WWW-Authenticate: Basic realm="Please input"');

header('HTTP/1.0 401 Unauthorized');

echo '請輸入正確的帳號及密碼, 不可以取消!';

exit;

} else {

$correctName="abc";

$correctpwd="123" ;

if (($_SERVER['PHP_AUTH_USER'] != $correctName) or

($_SERVER['PHP_AUTH_PW'] !=$correctpwd)){

echo "登入失敗,請開啟新的瀏覽器重新登入";

}
else{
    echo "嗨囉!";
    
}

}

?>