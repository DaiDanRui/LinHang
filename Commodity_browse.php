<?php
require_once 'class/Config_commodity.php';
require_once 'class/DBpagination.php';
require_once 'class/DBcount.php';
require_once 'class/Config.php';
include_once ('smarty_init.php');
define('size', 10);


$type = isset($_POST['type'])? Config_commodity::course_or_reward.' = '.$_POST['type'] : '';
$where = '';
$conn = Config::connect();
$dbcount = new DBcount(Config_commodity::table_name,$where);
$count = 1+((int)($dbcount->excute($conn)/size));

$page = isset($_POST['page'])? $_POST['page'] : 1;
$page = $page>$conn? $count : $page;

$choosed_array = array(
    Config_commodity::commodity_state,
    Config_commodity::pic_path,
    Config_commodity::course_or_reward,
    Config_commodity::description,
    Config_commodity::id,
    Config_commodity::type
);
$DBpagination = new DBpagination(Config_commodity::table_name,$where, $page, size, $choosed_array);
$reval = $DBpagination->excute($conn);


$array = array();
while (($temp_database_row_array = mysqli_fetch_array($reval, MYSQL_ASSOC))!=null) {
    //array_push($array, $temp_database_row_array);
    //据说以下类似方法效率高一倍
    $array[] = $temp_database_row_array;
}
$smarty->assign('array',$array);
$smarty->display('');

mysqli_close($conn);
mysqli_free_result($reval);