<?php
session_start();
include_once ('smarty_init.php');
include_once ('class/user/Login.php');
include_once ('class/user/ResultReturn.php');
require_once 'class/Injection.php';

function try_to_login()
{
    $username = Injection::excute('username');
    $password = Injection::excute('pwd');

    include_once('class/DBtraverser.php');
    include_once('class/Config.php');
    include_once('class/Config_user.php');

    $myDBtraveser = new DBfinder(Config_user::table_name, Config_user::log_name."='$username'");
    $retval = $myDBtraveser->excuteWithoutConn();


    //handle the login result
    if (mysqli_num_rows($retval)==0){
        echo 'wrong log name';
    }else
    {
        $complete_ary = mysqli_fetch_array($retval, MYSQL_ASSOC);
        if( $complete_ary[Config_user::password] == $this->password )
        {
            $_SESSION['current_login_user'] = $username;
            $_SESSION['curennt_login_id'] = $complete_ary[Config_user::id];
        }
        else
        {
            echo 'wrong password';
        }
    }
}

if (isset($_POST['login'])){
    try_to_login();
}else if (isset($_POST['reg'])){
    $smarty->display("Login&Register/register1.html");
}else if (isset($_POST['forget'])){
    $smarty->display("forget.html");
}else{
    $smarty->display("Login&Register/login.html");
}


