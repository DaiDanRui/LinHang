<?php
session_start();
include_once ('smarty_init.php');
include_once 'class/Config_user.php';
require_once 'class/Injection.php';

/**
 * 
 * @param string $username
 */
function is_username_exist($username)
{
    include_once('class/DBtraverser.php');
    include_once('class/Config.php');
    include_once('class/Config_user.php');
    $ary = Config_user::log_name." = '$username' ";
    $myDBtraverser = new DBtraverser(Config_user::table_name, $ary);
    $retval = $myDBtraverser->excute_without_conn();
    return mysqli_num_rows($retval)!=0;

}

if (isset($_POST['next'])  
    && $_POST['next']=="true" 
    ){

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
        
        Config_user::log_name => Injection::excute('input_user'),
        Config_user::password => Injection::excute('input_pwd')
        );
   
    if(is_username_exist(Injection::excute('input_user'))){
        //if already exist
        $smarty->display("Login&Register/register-1.html");
        /* echo '<script type="text/javascript">
                     window.onload=function(){
                         alert("chenggong");
                         history.go(-1);
                     }</script>'; */
    }else{
        $_SESSION['register_user'] = $register_user;
        $smarty->display("Login&Register/register-2.html");
    }
    
   

}else if (isset($_POST['return'])){
    $smarty->display("Login&Register/login.html");

}else {
    $smarty->display("Login&Register/register-1.html");
}
