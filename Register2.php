<?php
include_once ('class/user/User.php');
session_start();
include_once ('smarty_init.php');


if (isset($_POST['next'])){
    if(!$_SESSION['register_user']){
        echo "bad";
    }
    $register_user =  $_SESSION['register_user'];
    $register_user->user_school = $_POST['input_sch'];
    $register_user->user_school_id = $_POST['input_stu_id'];
    $register_user->user_legal_name = $_POST['input_name'];
    $register_user->sex = $_POST['sex'];
    $smarty->display("register3.html");
}else {
    $smarty->display("register2.html");
}