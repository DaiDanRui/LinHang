<?php
session_start();
$_SESSION['CURRENT_LOGIN_ID'] =1; 
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/Config.php';
    $commodity_id = (int) $_GET['id'];
    $conn = Config::connect();
    
    //判断是否已赞
    require_once 'Inlcude_is_praised.php';
    if(!is_praised($conn, $commodity_id, $_SESSION['CURRENT_LOGIN_ID']))
    {
        require_once 'class/DBincrement.php';
        require_once 'class/Config_commodity.php';
        require_once 'class/DBadder.php';
        require_once 'class/Config_praise.php';
        
        //在数据库里面加
        $ary = array(
            Config_praise::commodity_id => $commodity_id,
            Config_praise::praiser_id => $_SESSION['CURRENT_LOGIN_ID'],
        );
        $DBadder = new DBadder(Config_praise::tbl_name, $ary);
        $DBadder->excute($conn);
        //更新商品被赞数
        $DBincrement = new DBincrement(
            Config_commodity::table_name,
            Config_commodity::praise,
            ' where '.Config_commodity::id.' = '."'".$commodity_id."'"
        );
        $DBincrement->excute($conn);
    }
    header("Location:Commodity_details.php?id=$commodity_id");
    
}

else
{
    include 'Login.php';
}
/* function add_praise($conn,$commodity_id)
{
    $ary = array(
        Config_praise::commodity_id => $commodity_id,
        Config_praise::praiser_id => $_SESSION['CURRENT_LOGIN_ID']
    );
    $DBadder = new DBadder($name, $ary);
}
function increment($conn,$commodity_id)
{
    
    $DBincrement = new DBincrement(
        Config_commodity::table_name,
        Config_commodity::praise,
        ' where '.Config_commodity::id.' = '.$commodity_id
    );
    return $DBincrement->excute($conn);
} */