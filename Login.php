<?php
session_start();
include_once ('smarty_init.php');
include_once ('class/user/User.php');
include_once ('class/user/ResultReturn.php');

if (isset($_POST['login'])){
    $user = new User();
    $log_name = $_POST['username'];
    $password = $_POST['pwd'];
    $_SESSION['is_verified_pass'] = false;
    
    $login_result = $user->login($log_name, $password);
    if ($login_result  == ResultReturn::log_verify_pass){
        $_SESSION['is_verified_pass'] = true;
        echo "succed to login";
    }else {
        echo "login failed";
    }
    
}else if (isset($_POST['reg'])){
    $smarty->display("register1.html");

}else if (isset($_POST['forget'])){
    $smarty->display("forget.html");

}else{
    $smarty->display("login.html");
}
