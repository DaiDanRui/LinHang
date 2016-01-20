<?php
session_start();
include_once ('smarty_init.php');
include_once ('class/user/User.php');
include_once ('class/user/ResultReturn.php');

if (isset($_POST['login'])){
    $user = new User();
    $log_name = $_POST['username'];
    $password = $_POST['pwd'];
    
    
    $login_result = $user->login($log_name, $password);
    //save the login information
    $_SESSION['is_verified_pass'] = false;
    $_SESSION['current_login_user'] = $user;
    
    //handle the login result
    if ($login_result  == ResultReturn::log_verify_pass){
        $_SESSION['is_verified_pass'] = true;
        echo "succed to login";
    }else if($login_result == ResultReturn::log_name_not_exist){
        echo "login failed";
    }else if($login_result == ResultReturn::password_wrong){
        echo "wrong password";
    }
    
}else if (isset($_POST['reg'])){
    $smarty->display("register1.html");

}else if (isset($_POST['forget'])){
    $smarty->display("forget.html");

}else{
    $smarty->display("login.html");
}
