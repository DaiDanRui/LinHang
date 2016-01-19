<?php
include_once ('class/user/User.php');
session_start();
include_once ('smarty_init.php');

echo "start<br/>";
if (isset($_POST['next'])  && $_POST['next'] ){
    echo $_POST['next'];
    $register_user = new User();
    $register_user->user_log_name = $_POST['input_user'];
    $register_user->user_password = $_POST['input_pwd'];
    
    if($register_user->search()){
        //if already exist
        $smarty->display("register1.html");
    }else{
        
        $_SESSION['register_user'] = $register_user;
        //    $p1 = $_SESSION['register_user']->user_log_name ;
        //    echo "$p1";
        $smarty->display("register2.html");
    }
    
   

}else if (isset($_POST['return'])){
    $smarty->display("login.html");

}else {
    $smarty->display("register1.html");
}

