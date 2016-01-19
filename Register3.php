<?php
include_once ('class/user/User.php');
session_start();
include_once ('smarty_init.php');
include_once ('class/user/ResultReturn.php');

if (isset($_POST['next'])){
    $_SESSION['register_user']->user_nick_name    = $_POST['input_nick'];
    $_SESSION['register_user']->birthday          = date('Y-m-d H:i:s',time());
    $_SESSION['register_user']->user_phone_number = $_POST['input_phone'];
    $_SESSION['register_user']->user_email        = $_POST['input_email'];
    
    $_SESSION['register_user']->is_active         = 1;
    $_SESSION['register_user']->last_log          =  date('Y-m-d H:i:s',time());
    if($_SESSION['register_user']->insert_to_DB()==ResultReturn::register_pass){
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