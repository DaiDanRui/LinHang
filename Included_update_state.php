<?php

 /**
  * 执行更新操作更新商品信息，并根据商品ID查询商品信息
  * @param 数据库连接 $conn
  * @param bigint $commodity_id
  * @param tinyint $state
  * @return array 以数组形式返回查询结果
  */
function update_commodity_state_and_return_commodity($conn,$commodity_id, $state)
{
    require_once 'class/commodity/Transaction_state_config.php';
    require_once 'class/Config_commodity.php';
    require_once 'class/DBupdater.php';
    require_once 'class/DBtraverser.php';
    $ary = array(
        Config_commodity::commodity_state => $state
    );
    $where = ' where '.Config_commodity::id.' = '."'$commodity_id'";
    $DBupdater = new DBupdater(
        Config_commodity::table_name,
        $ary,
        $where
    );
    $DBupdater->excute($conn);
    $DBtraveser = new DBtraverser(Config_commodity::table_name,$where);
    $retval =  $DBtraveser->excute($conn);
    return mysqli_fetch_array($retval, MYSQLI_ASSOC);
}