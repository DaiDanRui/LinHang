<?php
/**
 * 
 * @param integer $commodity_id
 * @param integer $praiser_id
 * @return boolean 返回是否已经存在对应的记录
 */
function is_praised($conn,$commodity_id,$praiser_id)
{
    require_once 'class/DBcount.php';
    require_once 'class/Config_praise.php';
    $DBcount = new DBcount(
        Config_praise::tbl_name,
        'where '.Config_praise::commodity_id.' = '."'".$commodity_id."'".
        ' AND '.Config_praise::praiser_id.' = '."'".$praiser_id."'"
    );
    $retval = ($DBcount->excute($conn));
    $row = mysqli_fetch_array($retval,MYSQLI_NUM);
    return $row? $row[0]:0 ;
    
}