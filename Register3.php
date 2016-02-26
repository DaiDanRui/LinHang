<?php

/**
 * $post next input_nick input_phone input_email
 */
session_start();
include_once ('smarty_init.php');
include_once ('class/user/ResultReturn.php');
include_once 'class/Config_user.php';
require_once 'class/Injection.php';

/**
 *
 */
function register()
{
    include_once('class/DBadder.php');
    $myDBadder = new DBadder(Config_user::table_name, $this->ary);
    if($myDBadder->excute_without_conn())
    {
        return false;
    }
    else
    {
        return true;
    }
}

if (isset($_POST['next'])){
    $_SESSION['register_user'][Config_user::nick_name]    = Injection::excute('input_nick');
    $_SESSION['register_user'][Config_user::birthday]          = date('Y-m-d H:i:s',time());
    $_SESSION['register_user'][Config_user::phone_number] = Injection::excute('input_phone');
    $_SESSION['register_user'][Config_user::email]        = Injection::excute('input_email');
    
    if(register($_SESSION['register_user'])){
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

