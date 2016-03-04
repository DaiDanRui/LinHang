<?php
/**
 * @param  $conn
 * @return boolean 判断当前用户是否拥有权限
 */
function loginer_isPublisher($conn, $commodity_id)
{

    $where = ' where '.Config_commodity::id.' = '."'".$commodity_id."'";
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