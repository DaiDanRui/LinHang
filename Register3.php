<?php

/**
 * $post next input_nick input_phone input_email
 */
session_start();
include_once ('smarty_init.php');
include_once ('class/user/ResultReturn.php');
include_once 'class/Config_user.php';
include_once 'class/user/Register.php';
if (isset($_POST['next'])){
    $_SESSION['register_user'][Config_user::nick_name]    = $_POST['input_nick'];
    $_SESSION['register_user'][Config_user::birthday]          = date('Y-m-d H:i:s',time());
    $_SESSION['register_user'][Config_user::phone_number] = $_POST['input_phone'];
    $_SESSION['register_user'][Config_user::email]        = $_POST['input_email'];
    
    $register = new Register($_SESSION['register_user']);
    if($register->register()==ResultReturn::register_pass){
        $smarty->display("login.html");
    }else{
        //what if login failed
        $smarty->display("register3.html");
    }
    
    
}else if (isset($_POST['return'])){
    $smarty->display("register2.html");

}else{
    $smarty->display("register3.html");
}