<?php
session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    include 'smarty_init.php';
    require_once 'class/Info_user.php';
    require_once 'class/Config.php';
    
    $conn = Config::connect();
    $user = Info_user::get_user_info_by_id($conn, $_SESSION['CURRENT_LOGIN_ID']);
    
    $smarty->assign('',$user);
    $smarty->display('');
}
//如果没有登陆
else {
    include 'Login.php';
}