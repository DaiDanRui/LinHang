<?php
session_start();
//$_SESSION['CURRENT_LOGIN_ID'] = 1;
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/Config.php';
    $commodity_id = (int) $_GET['id'];
    $conn = Config::connect();
    add_message_to_DB($conn,$commodity_id);//存储信息
    update_message_time($conn,$commodity_id);//留言数增1
    mysqli_close($conn);
    header("Location:Commodity_details.php?id=$commodity_id");
}
else 
{
    require_once 'Login.php';
}
/**
 * 前置： 必须满足已经判断确定用户已经登陆
 * @param unknown $conn 数据库连接
 */
function add_message_to_DB($conn,$commodity_id)
{
    require_once 'class/DBadder.php';
    require_once 'class/Config_leave_message.php';
    require_once 'class/Config.php';
    require_once 'class/Injection.php';
    $talker_id = $_SESSION['CURRENT_LOGIN_ID'];
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
function update_message_time($conn,$commodity_id)
{
    require_once 'class/DBincrement.php';
    require_once 'class/Config_commodity.php';
    require_once 'class/Config_leave_message.php';
    $DBincrement = new DBincrement(
        Config_commodity::table_name,
        Config_commodity::leave_message_time,
        ' where '.Config_commodity::id.' = '.$commodity_id
    );
    return $DBincrement->excute($conn);
}