<?php
/**
 * id
 */
session_start();
require_once 'class/DBtraverser.php';
require_once 'class/Config_commodity.php';
include_once ('smarty_init.php');

    $where = ' where '.Config_commodity::id.' = '."'".(int)($_GET['id'])."'";
    $DBtraverser = new DBtraverser(Config_commodity::table_name,$where);
    $result = $DBtraverser->excute_without_conn();
    $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($array)
    {
        $smarty->assign('array',$array);
        $smarty->display('');
    }
    else 
    {
        echo '<script language="javascript">alert("数据不存在");</script>'; 
    
    }
    mysqli_free_result($result);