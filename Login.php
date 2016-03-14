<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once ('smarty_init.php');
include_once ('class/user/Login.php');
include_once ('class/user/ResultReturn.php');
require_once 'class/Injection.php';
function try_to_login()
{
    $username = Injection::excute('username');
    $password = Injection::excute('pwd');

  //  echo $username;
   // echo $password;
    include_once('class/DBtraverser.php');
    include_once('class/Config.php');
    include_once('class/Config_user.php');

    $myDBtraveser = new DBtraverser(Config_user::table_name, ' where '.Config_user::log_name."='$username'");
    $retval = $myDBtraveser->excute_without_conn();


    //handle the login result
    if (mysqli_num_rows($retval)==0){
        echo 'wrong log name';
    }else
    {
        $complete_ary = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        if( $complete_ary[Config_user::password] == $password )
        {
            $_SESSION['CURRENT_LOGIN_USER'] = $username;
            $_SESSION['CURRENT_LOGIN_ID'] = $complete_ary[Config_user::id];
            header("Location:Commodity_browse.php");
        }
        else
        {
            echo 'wrong password';
        }
    }
    mysqli_free_result($retval);
}

if (isset($_POST['login'])){
    try_to_login();
}else if (isset($_POST['reg'])){
    $smarty->display("Login&Register/register1.html");
}else if (isset($_POST['forget'])){
    $smarty->display("forget.html");
}else{
//    echo "in";
//    var_dump("$smarty");
    $smarty->display("Login&Register/Login.html");
}
