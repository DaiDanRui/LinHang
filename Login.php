<?php
session_start();
include_once ('smarty_init.php');
include_once ('class/user/Login.php');
include_once ('class/user/ResultReturn.php');

if (isset($_POST['login'])){
   
    $login = new Login( $_POST['username'], $_POST['pwd']);
    
    $login_result = $login->login();
    //save the login information
    $_SESSION['is_verified_pass'] = false;
    $_SESSION['current_login_user'] = $_POST['username'];
    
    //handle the login result
    if ($login_result  == ResultReturn::log_verify_pass){
        $_SESSION['is_verified_pass'] = true;
        $_SESSION['current_login_user'] = $_POST['username'];
        echo "succed to login";
    }else if($login_result == ResultReturn::log_name_not_exist){
        echo "login failed:log_name_not_exist";
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
