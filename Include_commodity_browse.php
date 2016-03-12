<?php
define('SIZE_EACH_PAGE', 10);
/**
 * 
 * @param string $where
 * @return array 返回数据库查询后的数组:
 */
function pagination($where,$conn,$tbl_name)
{
    require_once 'class/Config_commodity.php';
    require_once 'class/DBpagination.php';
    require_once 'class/DBcount.php';
    require_once 'class/Info_user.php';
    require_once 'class/Config_user.php';
    require_once 'Include_picture.php';
    //2.向数据库查询符合条件数，以计算显示分页数目
    $dbcount = new DBcount($tbl_name,$where);
    $retval = ($dbcount->excute($conn));
    $row = mysqli_fetch_array($retval,MYSQLI_NUM);
    $count = 1+ (int)(($row? $row[0]:0)/SIZE_EACH_PAGE);
    //3.计算当前页码；
    $page = isset($_GET['page'])?  (int)$_GET['page'] : 1;
    $page = $page>$count? $count : $page;
    
    //4. 查询当前页的数据
        $choosed_fields = array( //被选择的字段
   //       Config_commodity::commodity_state,
    //      Config_commodity::course_or_reward,
          Config_commodity::table_name.'.'.Config_commodity::description,
          Config_commodity::table_name.'.'.  Config_commodity::id,
          Config_commodity::table_name.'.'.  Config_commodity::publisher,
          Config_commodity::table_name.'.'.  Config_commodity::title,
          Config_commodity::table_name.'.'.  Config_commodity::price,
          Config_commodity::table_name.'.'.  Config_commodity::release_date,
          Config_commodity::table_name.'.'.  Config_commodity::praise,
          Config_commodity::table_name.'.'.  Config_commodity::leave_message_time,
          Config_commodity::table_name.'.'.  Config_commodity::id
            
    //      Config_commodity::type
        );
        $DBpagination = new DBpagination($tbl_name,$where, $page, SIZE_EACH_PAGE, $choosed_fields);
        $reval = $DBpagination->excute($conn);
       
       //逐个配置 array 三级关联数组  供界面使用
        $array = array();
        while (($temp_database_row_array = mysqli_fetch_array($reval, MYSQLI_ASSOC))!=null) {
            $userinfo = Info_user::get_user_info($conn, $temp_database_row_array[Config_commodity::publisher]);
            $array[] = array(
                'imgs' => get_commodity_pic($conn, $temp_database_row_array[Config_commodity::id]),
                'description' => $temp_database_row_array[Config_commodity::description],
                'title' => $temp_database_row_array[Config_commodity::title],
                'price' => $temp_database_row_array[Config_commodity::price],
                'url' => 'upload/default.jpg', //need
                'name' => $userinfo[Config_user::log_name],
                'time' => get_time($temp_database_row_array[Config_commodity::release_date]),
                'star_numbers' => $temp_database_row_array[Config_commodity::praise],
                'message_numbers' => $temp_database_row_array[Config_commodity::leave_message_time],
                'id' => $temp_database_row_array[Config_commodity::id],
            );
        }
       //5.释放资源
        mysqli_free_result($reval);
    return array('page'=>$page,'array'=>$array);
}

$now_time=time();
function get_time($release_date)
{
    global $now_time;
    $release_time=strtotime($release_date);
    return 2+(int)(($now_time-$release_time)/3600/24);
    
}