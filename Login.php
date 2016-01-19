<?php
session_start();
include_once ('smarty_init.php');
include_once ('class/user/User.php');


if (isset($_POST['login'])){
    $user = new User();
    $log_name = $_POST['username'];
    $password = $_POST['pwd'];
    $_SESSION['is_verified_pass'] = false;
    if ( $user->login($log_name, $password)){
        $_SESSION['is_verified_pass'] = true;
        echo "succed to login";
    }else {
        echo "login failed";
    }
    
}else{
    
}
$smarty->display("login.html");