<?php
/**
 * id
 * 
 */
session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/Config_commodity.php';
    require_once 'class/DBtraverser.php';
    require_once 'class/DBupdater.php';
    require_once 'class/Config_commodity.php';
    require_once 'class/Config.php';
    require_once 'class/commodity/Transaction_state_config.php';
    require_once 'Include_is_publisher.php';
    $conn = Config::connect();
    $commodity_id = (int)($_GET['id']);
    $where = ' where '.Config_commodity::id.' = '."'".$commodity_id."'";
    if(loginer_isPublisher($conn, $where))
    {
        require_once 'class/DBupdater.php';
        $updater_ary = array(Config_commodity::commodity_state=>Transaction_state_config::commodity_deleted);
        $DBupdater = new DBupdater(Config_commodity::table_name, $updater_ary, $where);
        $DBupdater->excute($conn);
    }
    mysqli_close($conn);
}

else
{
    include 'Login.php';
}

