<?php
session_start();
include_once ('smarty_init.php');
include_once 'class/Config_user.php';

if (isset($_POST['next'])){
    
    $_SESSION['register_user'][Config_user::school] = $_POST['input_sch'];
    $_SESSION['register_user'][Config_user::school_id] = $_POST['input_stu_id'];
    $_SESSION['register_user'][Config_user::legal_name] = $_POST['input_name'];
    $_SESSION['register_user'][Config_user::sex] = $_POST['sex'];
    $smarty->display("register3.html");
}else if (isset($_POST['return'])){
    $smarty->display("register1.html");

}else {
    $smarty->display("register2.html");
}