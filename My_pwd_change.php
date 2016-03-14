<?php
session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID'])){
    include 'smarty_init.php';
    require_once 'class/Config.php';
    require_once 'class/Config_user.php';
    if(isset($_POST['reset'])){
        //new_pwd new_pwd2 old
        require_once 'class/Config.php';
        require_once 'class/Info_user.php';
        $pwd = $_POST['old'];
        $newPwd = $_POST['new_pwd'];
        $conn = Config::connect();
        $logname = $_SESSION['CURRENT_LOGIN_USER'];
        $retval = Info_user::updateInfo($logname, $pwd, $conn, $newPwd);
        if($retval==Info_user::logname_not_exsit){
            echo "<script language='javascript'> alert('logname_not_exsit!');
                window.history.go(-1);
                </script>";
      //      $smarty->display('My/my-change-pwd.html');
        }else if($retval==Info_user::wrong_pass_word){
            echo "<script language='javascript'> alert('wrong_pass_word!');
                window.history.go(-1);</script>";
    //        $smarty->display('My/my-change-pwd.html');
        }else if($retval==Info_user::done){
           echo "<script language='javascript'> alert('done!') ;
               window.history.go(-2);</script>";
   //         $smarty->display('My/my-set.html');
        }
    }else {
        $smarty->display('My/my-change-pwd.html');
    }
}else{
    header('Location:Login.php');
}


