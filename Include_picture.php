<?php
/**
 * 通过商品ID（悬赏或者技能发布的ID）查找对应的图片列表
 * @return 返回的是对应图片组成的数组
 */

function get_commodity_pic($conn,$commodity)
{
    return array('upload/default.jpg','upload/default.jpeg','upload/default.jpg','upload/default.jpeg');
    require_once 'class/Config_picture.php';
    $query = 'select path from tbl_picture when commodity_id = '."'$commodity'";
    $retval = mysqli_query($conn, $query);
    $array_picture = array();
    while (($temp_database_row_array = mysqli_fetch_array($retval, MYSQL_NUM))!=null) {
        $array_picture[] = $temp_database_row_array[0];
    }
    mysqli_free_result($retval);
    return $array_picture;
}
