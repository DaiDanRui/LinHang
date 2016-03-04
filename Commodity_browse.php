<?php
    session_start();
    require_once 'class/Injection.php';
    require_once 'class/Config_commodity.php';
    require_once 'Include_commodity_browse.php';
    include 'smarty_init.php';
    

    //1.获取限定条件
        $where = 'where '.Config_commodity::commodity_state." = '2'";
        if(($_GET['course_or_reward']))//when $_GET['course_or_reward'] isset && $_GET['course_or_reward']!=0
        {
            $where.='AND'. Config_commodity::course_or_reward.' = '."'".Injection::excute('course_or_reward')."'";
        }
        if(($_GET['type']))  //when $_GET['type'] isset && $_GET['type']!=0
        {
            $where.='AND'.Config_commodity::type.' = '."'".Injection::excute('type')."'";
        }
        $order_field = isset($_GET['oder'])? Injection::excute('order') : Config_commodity::release_date;
        $where .= 'ORDER BY '.$order_field ;

    //2.获取数组数据    
    $list =  pagination($where);
    //3.显示数据
    $smarty->assign('page',$list['page']);
    $smarty->assign('array',$list['array']);
    $smarty->display('');
    
