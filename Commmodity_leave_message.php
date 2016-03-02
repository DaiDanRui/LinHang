<?php
session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/Config.php';
   
    $conn = Config::connect();
    add_message_to_DB($conn);//存储信息
    update_message_time($conn);//留言数增1
    mysqli_close($conn);
}
else 
{
    require_once 'Login.php';
}
/**
 * 前置： 必须满足已经判断确定用户已经登陆
 * @param unknown $conn 数据库连接
 */
function add_message_to_DB($conn)
{
    require_once 'class/Injection.php';
    require_once 'class/DBadder.php';
    require_once 'class/Config_leave_message.php';
    $commodity_id = Injection::excute('id');
    $talker_id = $_SESSION['CURENNT_LOGIN_ID'];
    $talker_content = Injection::excute('content');
    
    $array = array(
        Config_leave_message::commodity_id => $commodity_id,
        Config_leave_message::content => $talker_content,
        Config_leave_message::talker => $talker_id,
        Config_leave_message::time => date('Y-m-d H:i:s',time())
    );
    
    $DBadder = new DBadder(Config_leave_message::tbl_name, $array);
    return $DBadder->excute($conn);
}
/**
 * 前置： 必须满足已经判断确定用户已经登陆
 * @param unknown $conn
 */
function update_message_time($conn)
{
    require_once 'class/DBincrement.php';
    require_once 'class/Config_commodity.php';
    $DBincrement = new DBincrement(
        Config_commodity::table_name,
        Config_commodity::leave_message_time,
        ' where '.Config_commodity::id.' = '.$_SESSION['CURENNT_LOGIN_ID']
    );
    return $DBincrement->excute($conn);
}