<?php
    session_start();
    require_once 'class/Config_commodity.php';
    require_once 'class/DBpagination.php';
    require_once 'class/DBcount.php';
    require_once 'class/Config.php';
    require_once 'class/Injection.php';
    include 'smarty_init.php';
    define('SIZE_EACH_PAGE', 10);

    //1.获取限定条件
        $where = 'where '.Config_commodity::commodity_state." = '0'";
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


    //2.连接数据库    
    $conn = Config::connect();//多次使用的数据库连接
    //2.向数据库查询符合条件数，以计算显示分页数目
    $dbcount = new DBcount(Config_commodity::table_name,$where);
    $count = 1+((int)($dbcount->excute($conn)/SIZE_EACH_PAGE));
    //3.计算当前页码； 查询当前页的数据
        $page = isset($_GET['page'])?  (int)$_GET['page'] : 1;
        $page = $page>$count? $count : $page;
        
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
        
    //4.显示数据
    $smarty->assign('array',$array);
    $smarty->display('');
    //5.释放资源
    mysqli_close($conn);
    mysqli_free_result($reval);
