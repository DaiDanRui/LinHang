<?php
session_start();
include_once ('smarty_init.php');
include_once 'class/Config_user.php';

/**
 *
 * @param string $username
 */
function is_username_exist($username)
{
    include_once('class/DBtraverser.php');
    include_once('class/Config.php');
    include_once('class/Config_user.php');
    include_once 'class/DBcount.php';
    $ary = ' where '.Config_user::log_name. " = '$username' ";
    $myDBcount = new DBcount(Config_user::table_name, $ary);
    $retval = $myDBcount->excute_without_conn();
    $row = mysqli_fetch_array($retval,MYSQLI_NUM);
    return $row? $row[0]:0;
}

if (isset($_POST['reg'])){
    
    require_once 'class/Injection.php';
    $name = Injection::excute('username');
    $pwd =  Injection::excute('pwd');
    $phone =Injection::excute('phone');
    
    $register_user =  Array(
        Config_user::is_seller => 1,
        Config_user::create_time=> date('Y-m-d H:i:s',time()),
        Config_user::last_log=> date('Y-m-d H:i:s',time()),

        Config_user::phone_number =>  $phone,
        
        Config_user::seller_credit=>5,
        Config_user::payer_credit=>5,

        Config_user::log_name => $name,
        Config_user::password => $pwd,
        Config_user::pic_path => 'avatar.jpg',
    );
    if(is_username_exist($name)){
        
    }else{
        include_once('class/DBadder.php');
        $myDBadder = new DBadder(Config_user::table_name, $register_user);
        if($myDBadder->excute_without_conn())
        {
            $smarty->display("Login&Register/Login.html");
        }
    }

}else {
    $smarty->display("Login&Register/Register.html");
}