<?php

/**
 * $post next input_nick input_phone input_email
 */
session_start();
include_once ('smarty_init.php');
include_once ('class/user/ResultReturn.php');
include_once 'class/Config_user.php';
include_once 'class/user/Register.php';
require_once 'class/Injection.php';

if (isset($_POST['next'])){
    $_SESSION['register_user'][Config_user::nick_name]    = Injection::excute('input_nick');
    $_SESSION['register_user'][Config_user::birthday]          = date('Y-m-d H:i:s',time());
    $_SESSION['register_user'][Config_user::phone_number] = Injection::excute('input_phone');
    $_SESSION['register_user'][Config_user::email]        = Injection::excute('input_email');
    
    $register = new Register($_SESSION['register_user']);
    if($register->register()==ResultReturn::register_pass){
        $smarty->display("login.html");
    }else{
        //what if login failed
        $smarty->display("Login&Register/register-3.html");
    }
    
    
}else if (isset($_POST['return'])){
    $smarty->display("Login&Register/register-2.html");

}else{
    $smarty->display("Login&Register/register-3.html");
}