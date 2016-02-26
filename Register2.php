<?php
session_start();
include_once ('smarty_init.php');
include_once 'class/Config_user.php';

if (isset($_POST['next'])){
    
    $_SESSION['register_user'][Config_user::school] = Injection::excute('input_sch');
    $_SESSION['register_user'][Config_user::school_id] = Injection::excute('input_stu_id');
    $_SESSION['register_user'][Config_user::legal_name] = Injection::excute('input_name');
    $_SESSION['register_user'][Config_user::sex] = Injection::excute('sex');
    $smarty->display("register3.html");
}else if (isset($_POST['return'])){
    $smarty->display("Login&Register/register-1.html");

}else {
    $smarty->display("Login&Register/register-2.html");
}