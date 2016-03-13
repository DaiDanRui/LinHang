<?php
session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID'])){
    include 'smarty_init.php';
    require_once 'class/Config.php';
    require_once 'class/Config_user.php';
    if(isset($_POST['reset'])){
        //new_pwd new_pwd2 old
        require_once 'class/Config.php';
        $pwd = $_POST['old'];
        $newPwd = $_POST['new_pwd'];
        $conn = Config::connect();
        
    }else {
        $smarty->display('My/my-change-pwd.html');
    }
}else{
    header('Login.php');
}


