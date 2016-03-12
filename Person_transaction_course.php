<?php
session_start();
define('SIZE_EACH_PAGE', 10);
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/Config_transaction.php';
    require_once 'class/Config_commodity.php';
    require_once 'class/commodity/Commodity_type_Config.php';
    require_once 'class/Config.php';
    //0.where
    if((int)$_GET['course_and_reward']==Commodity_type_Config::course)
    {
        $where = 'where '.Config_transaction::table_name.".".
                  Config_transaction::commodity_buyer_id.'='."'".$_SESSION['CURRENT_LOGIN_ID']."'";
    }
    else 
    {
        $where = 'where '.Config_transaction::table_name.".".
                  Config_transaction::commodity_holder_id.'='."'".$_SESSION['CURRENT_LOGIN_ID']."'";
    }
//    $where = 'select   a.*,b.*   from   a   inner   join   b     on   a.id=b.parent_id       ';
    //1.连接数据库
    $conn = Config::connect();//多次使用的数据库连接
    //2.向数据库查询符合条件数，以计算显示分页数目
    $dbcount = new DBcount(Config_transaction::table_name,$where);
    $count = 1+((int)($dbcount->excute($conn)/SIZE_EACH_PAGE));
    //3.计算当前页码；
    $page = isset($_GET['page'])?  (int)$_GET['page'] : 1;
    $page = $page>$count? $count : $page;
    
    //4.分页执行
    $query = 'select '.Config_transaction::table_name.".".Config_commodity::commodity_state.','.
                        Config_commodity::table_name.".".Config_commodity::pic_path.','.
                        Config_commodity::table_name.".".Config_commodity::course_or_reward.','.
                        Config_commodity::table_name.".".Config_commodity::description.','.
                        Config_commodity::table_name.".".Config_commodity::id.','.
                        Config_commodity::table_name.".".Config_commodity::type.','.
                        Config_transaction::table_name.".".Config_transaction::commodity_buyer_id.','.
                        Config_transaction::table_name.".".Config_transaction::commodity_holder_id.
            ' from '.Config_transaction::table_name.','.Config_commodity::table_name.' '.
            $where.' AND '.Config_commodity::table_name.'.'.Config_commodity::id.'='.
                       Config_transaction::table_name.'.'.Config_transaction::choosed_id.
                       ' DESC LIMIT '.($page-1)*SIZE_EACH_PAGE.','.SIZE_EACH_PAGE;
    $retval = mysqli_query($conn, $query);
    
    $array_commofity_info = array();
    while (($temp_database_row_array = mysqli_fetch_array($retval, MYSQLI_ASSOC))!=null) {
        //array_push($array, $temp_database_row_array);
        //据说以下类似方法效率高一倍
        $array_commofity_info[] = $temp_database_row_array;
    }
    
    mysqli_close($conn);
    mysqli_free_result($retval);
}
else
{
    include 'Login.php';
}