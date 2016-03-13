<?php
session_start();
$_SESSION['CURRENT_LOGIN_ID'] = 1;
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    include 'smarty_init.php';
    require_once 'class/Info_user.php';
    require_once 'class/Config.php';
    
    $conn = Config::connect();
    $user_array = Info_user::get_user_info_by_id($conn, $_SESSION['CURRENT_LOGIN_ID']);
    
    $my_personal = array(
        'introduction' => $user_array[Config_user::autograph],
        'good_buyer' => $user_array[Config_user::payer_credit],
        'good_seller' => $user_array[Config_user::seller_credit],
        'username' => $user_array[Config_user::legal_name],
        'nickname' => $user_array[Config_user::log_name],
        'gender' => $user_array[Config_user::sex],
        'phone' => $user_array[Config_user::phone_number],
        'email' => $user_array[Config_user::email],
        'birth' => $user_array[Config_user::birthday],
        'good_at' => $user_array[Config_user::strongpoint],
        'hobby' => $user_array[Config_user::interestc],
        'url_header'=> 'upload/avatar.png'
    );
    $smarty->assign('my_personal',$my_personal);
    $smarty->display('My/my-personal.html');
}
//如果没有登陆
else {
    include 'Login.php';
}