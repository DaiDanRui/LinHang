<?php
if(!isset($_SESSION))
{
    session_start();
}
    /**
     * type
     * page
     * title
     * publisher
     */
    require_once 'class/Injection.php';
    require_once 'class/Config_commodity.php';
    require_once 'Include_commodity_browse.php';
    include 'smarty_init.php';
    require_once 'class/Config.php';
    require_once 'class/commodity/Commodity_type_Config.php';
    //0.连接数据库
    $conn = Config::connect();//多次使用的数据库连接
    
    //1.获取限定条件
        $where = ' where '.Config_commodity::commodity_state." < '2' ";

        
        //浏览的商品分类 
        if(isset($_GET['type']))  //when $_GET['type'] isset && $_GET['type']!=0
        {
            if($_GET['type']=='market')//when $_GET['course_or_reward'] isset && $_GET['course_or_reward']!=0
            {
                $where.=' AND '. Config_commodity::course_or_reward.' = '."'".Commodity_type_Config::course."'";
            }else{
                $where.=' AND '. Config_commodity::course_or_reward.' = '."'".Commodity_type_Config::reward."'";
            }
        }
        
      //时间限定
        if(isset($_POST['time-week'])){
            header('Location:Login.php');
            $where .= ' AND '.Config_commodity::release_date > (date("Y-m-d H:i:s",time()-7*24*3600));
        }else if(isset($_POST['time-month'])){
            $where .= ' AND '.Config_commodity::release_date > (date("Y-m-d H:i:s",time()-30*24*3600));
        }else if(isset($_POST['time-halfYear'])){
            $where .= ' AND '.Config_commodity::release_date> (date("Y-m-d H:i:s",time()-6*30*24*3600));
        }else if(isset($_POST['time-day'])){//三天内的
            $where .= ' AND '.Config_commodity::release_date> (date("Y-m-d H:i:s",time()-3*30*24*3600));
        }
        
        //是否有进行搜索
        if(isset($_REQUEST['search'])){
        //    $where .= ' AND MATCH ('. Config_commodity::title.' ) AGAINST('. "'". $_REQUEST['search']."'" .')';
            $where .=  ' AND '.Config_commodity::title.' LIKE '."'%". $_REQUEST['search']."%'";
        }
        $where .=  ' AND '.Config_commodity::title.' LIKE '."'%". 'P'."%'";
      //排序控制  
        if(isset($_POST['price-high'])){//价格最高的
            $where .= ' ORDER BY '.Config_commodity::price.' desc '  ;
        }else if(isset($_POST['price-low'])){//价格最低的
            $where .= ' ORDER BY '.Config_commodity::price;
        }else if(isset($_POST['time-new'])){//
            $where .= ' ORDER BY '.Config_commodity::release_date ;
        }else if(isset($_POST['time-old'])){
            $where .= ' ORDER BY '.Config_commodity::release_date.' desc ' ;
        }
    
    
    //2.获取数组数据    
    $list =  pagination($where,$conn,Config_commodity::table_name);
    //所有分类信息
    //$types = get_all_types($conn);
    //3.显示数据
    $smarty->assign('page',$list['page']);
    $smarty->assign('items',$list['array']);
    $smarty->display('Reward&Market/market-main.html');
    //4.释放资源
    mysqli_close($conn);
    
