<?php
session_start();
include_once ('smarty_init.php');
include_once ('class/user/Login.php');
include_once ('class/user/ResultReturn.php');
require_once 'class/Injection.php';

if (isset($_POST['login'])){
    $username = Injection::excute('username');
    $password = Injection::excute('pwd');
    $login = new Login( $username, $password);
    
    $login_result = $login->login();
    //save the login information
    $_SESSION['is_verified_pass'] = false;
    $_SESSION['current_login_user'] = $username;
    
    //handle the login result
    if ($login_result  == ResultReturn::log_verify_pass){
        $_SESSION['is_verified_pass'] = true;
        $_SESSION['current_login_user'] = $username;
        echo "succed to login";
    }else if($login_result == ResultReturn::log_name_not_exist){
        echo "login failed:log_name_not_exist";
    }else if($login_result == ResultReturn::password_wrong){
        echo "wrong password";
    }
    
}else if (isset($_POST['reg'])){
    $smarty->display("Login&Register/register1.html");

}else if (isset($_POST['forget'])){
    $smarty->display("forget.html");

}else{
    $smarty->display("Login&Register/login.html");
}
