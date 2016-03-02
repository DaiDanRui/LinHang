<?php
session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/Config_commodity.php';
    require_once 'class/DBtraverser.php';
    require_once 'class/DBupdater.php';
    require_once 'class/Config_commodity.php';
    require_once 'class/Config.php';
    
    $conn = Config::connect();
    $where = ' where '.Config_commodity::id.' = '."'".(int)($_GET['id'])."'";
    if(loginer_isPublisher($conn, $where))
    {
        require_once 'class/DBupdater.php';
        $updater_ary = array(Config_commodity::commodity_state=>1);
        $DBupdater = new DBupdater(Config_commodity::table_name, $updater_ary, $where);
        $DBupdater->excute($conn);
    }
    mysqli_close($conn);
}

else
{
    include 'Login.php';
}

/**
 * @param  $conn
 * @return boolean 判断当前用户是否拥有权限
 */
function loginer_isPublisher($conn, $where)
{
    
    $DBtraverser = new DBtraverser(Config_commodity::table_name,$where);
    $result = $DBtraverser->excute($conn);
    $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($array)
    {
        $is_publisher =  $array[Config_commodity::publisher]==$_SESSION['CURRENT_LOGIN_ID'];
        
    }else 
    {
        
        $is_publisher =  false;
    }
    mysqli_free_result($result);
    return $is_publisher;
}