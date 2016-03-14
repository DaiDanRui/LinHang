<?php
/**
 * 点赞并收藏
 */
session_start();
//$_SESSION['CURRENT_LOGIN_ID'] = 1;
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/DBcount.php';
    require_once 'class/Config_praise.php';
    require_once 'class/Injection.php';
    require_once 'class/Config_commodity.php';
    require_once 'Include_commodity_browse.php';
    include 'smarty_init.php';
    require_once 'class/Config.php';
    //0.连接数据库
    $conn = Config::connect();//多次使用的数据库连接
    
    
    $where = ' where  tbl_praise.commodity_id = tbl_commodity.id AND tbl_praise.praiser_id = '.
              "'".$_SESSION['CURRENT_LOGIN_ID']."'";
    
    
    //2.获取数组数据
    $list =  pagination($where,$conn,Config_commodity::table_name.','.Config_praise::tbl_name);
    //所有分类信息
    //$types = get_all_types($conn);
    //3.显示数据
    $smarty->assign('page',$list['page']);
    $smarty->assign('my_stars',$list['array']);
    $smarty->display('My/my-star.html');
    //4.释放资源
    mysqli_close($conn);
}
else
{

}
