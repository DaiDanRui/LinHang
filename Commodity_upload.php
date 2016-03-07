<?php
/**
 * 多张图片
 * 截至日期
 */
session_start();

include_once("smarty_init.php");
//测试
   $_SESSION['CURRENT_LOGIN_ID'] = 1;
   $_SESSION['CURRENT_LOGIN_USER'] = 'daixinyan';
//如果已经登陆
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    if(isset($_POST['confirm']))
    {
        upload();
    }
    else {
        $smarty->display("Reward&Market/market-skill-publish.html");
    }
}
//如果没有登陆
else {
    include 'Login.php';
}


function upload()
{
    if(isset($_SESSION['CURRENT_LOGIN_ID']))
    {
        require_once 'class/Config_commodity.php';
        require_once 'class/Injection.php';
        require_once 'class/Config.php';
        $conn = Config::connect();
    
        $commodity_message = Array
        (
    //        Config_commodity::course_or_reward  => (int)$_GET['course_or_reward'],
            Config_commodity::type =>isset($_POST['type'])?  Injection::excute('type'):'其他' ,
            Config_commodity::publisher => $_SESSION['CURRENT_LOGIN_ID']     ,
    
            Config_commodity::price => (int)$_POST['price'] ,
            Config_commodity::release_date =>  date('Y-m-d H:i:s',time()) ,
           // Config_commodity::deleted_date => Injection::excute('time'),
            Config_commodity::deleted_date => date('Y-m-d H:i:s',time()),
            
            Config_commodity::title => Injection::excute('topic'),
            Config_commodity::description => Injection::excute('description')  	,
    
            //       Config_commodity::pic_path => $pic_path  	,
            Config_commodity::communication_number => Injection::excute('phone')
        );
    
        include_once('class/DBadder.php');
        $myDBadder = new DBadder(Config_commodity::table_name, $commodity_message);
        $myDBadder->excute($conn);
    
      //  upload_pictures($conn,mysqli_insert_id($conn));
        header('Commodity_browse.php');
    }else
    {
        include 'Login.php';
    }
}

function upload_pictures($conn, $commodity_id)
{
    require_once 'class/Picture_upload.php';
    for ($i = 1; true; $i++)
    {
        if (Picture_upload::error_message($i)>0) 
        {
            echo '<script language="javascript">alert("图片上传错误");</script>';
            break;
        }
        else
        {
            require_once 'class/DBadder.php';
            require_once 'class/Config_picture.php';
            $pic_path = Picture_upload::save_picture(dirname(__FILE__).'upload/');
            $pic_array = array(
                Config_picture::commodity_id => $commodity_id,
                Config_picture::path => $pic_path
            );
        }
        
    }
    
}
