<?php
define('SIZE_EACH_PAGE', 10);
/**
 * 
 * @param string $where
 * @return array 返回数据库查询后的数组:
 */
function pagination($where,$conn)
{
    require_once 'class/Config_commodity.php';
    require_once 'class/DBpagination.php';
    require_once 'class/DBcount.php';
    
    //2.向数据库查询符合条件数，以计算显示分页数目
    $dbcount = new DBcount(Config_commodity::table_name,$where);
    $count = 1+((int)($dbcount->excute($conn)/SIZE_EACH_PAGE));
    //3.计算当前页码；
    $page = isset($_GET['page'])?  (int)$_GET['page'] : 1;
    $page = $page>$count? $count : $page;
    
    //4. 查询当前页的数据
        $choosed_fields = array( //被选择的字段
            Config_commodity::commodity_state,
            Config_commodity::pic_path,
            Config_commodity::course_or_reward,
            Config_commodity::description,
            Config_commodity::id,
            Config_commodity::type
        );
        $DBpagination = new DBpagination(Config_commodity::table_name,$where, $page, SIZE_EACH_PAGE, $choosed_fields);
        $reval = $DBpagination->excute($conn);
       
        $array = array();
        while (($temp_database_row_array = mysqli_fetch_array($reval, MYSQL_ASSOC))!=null) {
            //array_push($array, $temp_database_row_array);
            //据说以下类似方法效率高一倍
            $array[] = $temp_database_row_array;
        }
        
       //5.释放资源
        mysqli_free_result($reval);
    return array('page'=>$page,'array'=>$array);
}