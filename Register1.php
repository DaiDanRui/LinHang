<?php
session_start();
include_once ('smarty_init.php');
include_once 'class/Config_user.php';
include_once 'class/user/Is_user_exist.php';

if (isset($_POST['next'])  
    && $_POST['next']=="true" 
    ){
  //  echo $_POST['next'];
    $register_user =  Array(
        Config_user::is_seller => 1,
        Config_user::is_active => 1,
        Config_user::create_time=> date('Y-m-d H:i:s',time()),
        Config_user::last_log=> date('Y-m-d H:i:s',time()),
        Config_user::seller_credit=>5,
        Config_user::payer_credit=>5,
        Config_user::income=>0,
        Config_user::pay=>0,
        Config_user::count_publish_course=>0,
        Config_user::count_publish_reward=>0,
        Config_user::count_choose_course=>0,
        Config_user::count_choose_reward=>0,
        
        Config_user::log_name => $_POST['input_user'],
        Config_user::password => $_POST['input_pwd']
        );
   
    $is_user_exist = new Is_user_exist($_POST['input_user']);
    if($is_user_exist->is_exist()){
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

