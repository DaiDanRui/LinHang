<?php
include_once ('class/user/User.php');
session_start();
include_once ('smarty_init.php');

if (isset($_POST['next'])  
    && $_POST['next']=="true" 
    ){
  //  echo $_POST['next'];
    $register_user = new User();
    $register_user->user_log_name = $_POST['input_user'];
    $register_user->user_password = $_POST['input_pwd'];
    
    if($register_user->is_exist() == ResultReturn::log_name_already_exist){
        //if already exist
        $smarty->display("register1.html");
        /* echo '<script type="text/javascript">
                     window.onload=function(){
                         alert("chenggong");
                         history.go(-1);
                     }</script>'; */
    }else{
        //<=> if($register_user->is_exist() == ResultReturn::log_name_not_exist)
        $_SESSION['register_user'] = $register_user;
        $smarty->display("register2.html");
    }
    
   

}else if (isset($_POST['return'])){
    $smarty->display("login.html");

}else {
    $smarty->display("register1.html");
}

