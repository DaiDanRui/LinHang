<?php
/**
 * 个人设置： 好评度*2 手机  昵称  姓名 性别  邮箱 圣体 擅长 爱好 个性签名
 * 账号设置： 密码
 * 主题设置
 */
session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    include 'smarty_init.php';
    require_once 'class/Config_user.php';
    
    $where = ' where '.Config_user::id.' = '."'".$_SESSION['CURRENT_LOGIN_ID']."'";
    $autograph = Injection::excute('');
    $birthday = Injection::excute('');
    $eamil = Injection::excute('');
    $interestc = Injection::excute('');
    $nick_name = Injection::excute('');
    $sex = Injection::excute('');
    $strongpoint = Injection::excute('');
    
    $ary = array(
        Config_user::autograph => $autograph,
        Config_user::birthday => $birthday,
        Config_user::email => $eamil,
        Config_user::interestc => $interestc,
        Config_user::nick_name => $nick_name,
        Config_user::sex => $sex,
        Config_user::strongpoint => $strongpoint
    );
    
    $DBupdater = new DBupdater(Config_user::table_name, $ary, $where);
    
    $smarty->assign('');
    $smarty->display('');
}
//如果没有登陆
else {
    include 'Login.php';
} 