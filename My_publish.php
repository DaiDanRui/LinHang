<?php
/**
 * 没有被别人接受的
 * 技能
 * 悬赏
 * 可以被编辑和删除
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
    require_once 'class/commodity/Transaction_state_config.php';
    //0.连接数据库
    $conn = Config::connect();//多次使用的数据库连接
    
    
    $where = ' where '.Config_commodity::publisher.' = '."'".$_SESSION['CURRENT_LOGIN_ID']."' "
        .' AND '.Config_commodity::commodity_state.' = '."'".Transaction_state_config::just_publish."'";

    if(isset($_GET['type']))
    {
        require_once 'class/commodity/Commodity_type_Config.php';
        if($_GET['type']=='skill')
        {
            $where .= ' AND '.Config_commodity::table_name.".".Config_commodity::course_or_reward
            .' = '."'".Commodity_type_Config::course."'";
        }else
        {
            $where .= ' AND '.Config_commodity::table_name.".".Config_commodity::course_or_reward
            .' = ' ."'".Commodity_type_Config::reward."'";
        }
    }
    
    //2.获取数组数据
    $list =  pagination($where,$conn,Config_commodity::table_name);
    //所有分类信息
    //$types = get_all_types($conn);
    //3.显示数据
    $smarty->assign('page',$list['page']);
    $smarty->assign('my_publishs',$list['array']);
    $smarty->display('My/my-published.html');
    //4.释放资源
    mysqli_close($conn);
}
//如果没有登陆
else {
    include 'Login.php';
} 