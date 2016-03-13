<?php
/**
 * 
 * must get 'id'
 * id
 * multi picture
 * leave message: name time content 
 */
 define('MESSAGE_EACH_PAGE', 10);
session_start();
require_once 'class/DBtraverser.php';
require_once 'class/Config_commodity.php';
include_once ('smarty_init.php');
require_once 'class/Config.php';

    $conn = Config::connect();
    $commodity_id = (int)($_REQUEST['id']);
    
    $where = ' where '.Config_commodity::id.' = '."'".$commodity_id."'";
    $DBtraverser = new DBtraverser(Config_commodity::table_name,$where);
    $result = $DBtraverser->excute($conn);
    $array_commofity_info = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($array_commofity_info)
    {
        require_once 'Include_picture.php';
        require_once 'class/Info_user.php';
        $array_pictures = get_commodity_pic($conn, $commodity_id);
        $array_message = get_leave_message($commodity_id, $conn);
        $userInfo = new Info_user();
        $username = $userInfo->get_user_logname($conn, $array_commofity_info[Config_commodity::publisher]);
        $commodity_array_for_display = array(
            'nickname' => $username,
            'title' => $array_commofity_info[Config_commodity::title],
            'time' => get_time($array_commofity_info[Config_commodity::release_date]),
            'price' => $array_commofity_info[Config_commodity::price],
            'description' => $array_commofity_info[Config_commodity::description],
            'description-img' => get_one_commodity_pic($conn, $array_commofity_info[Config_commodity::id]) ,
            'img' => 'upload/avatar.png',
            'id' => $commodity_id,
            'star_numbers' => $array_commofity_info[Config_commodity::praise],
            'message_numbers' => $array_commofity_info[Config_commodity::leave_message_time],
        );
        $smarty->assign('messages',$array_message);
        $smarty->assign('skill',$commodity_array_for_display);
        $smarty->assign('msg-total',$array_commofity_info[Config_commodity::leave_message_time]);
        $smarty->display('Reward&Market/market-skill.html');
    }
    else 
    {
    
    }
    mysqli_free_result($result);
    
    
    function get_time($release_date)
    {
        $now_time = time(); 
        $release_time=strtotime($release_date);
        return (int)( ($now_time-$release_time) /3600/24);
    
    }    
    
    
    function get_leave_message($commodity_id,$conn)
    {
        require_once 'class/Config_leave_message.php';
        require_once 'class/DBpagination.php';
        require_once 'class/Info_user.php';
        require_once 'class/Config_user.php';
        $page = isset($_REQUEST['page'])? ((int)$_GET['id']):1;
        $dbtraerser = new DBpagination(
             Config_leave_message::tbl_name, 
            ' where '.Config_leave_message::commodity_id.' = '."'".$commodity_id."'",
            $page,
            MESSAGE_EACH_PAGE,
            array(
                Config_leave_message::content,Config_leave_message::time,Config_leave_message::talker 
            )
         );
        $retval = $dbtraerser->excute($conn);
        
        $array_message = array();
        while (($temp_database_row_array = mysqli_fetch_array($retval, MYSQLI_ASSOC))!=null) 
        {
            $temp_user = Info_user::get_user_avatar_and_logname($conn, $temp_database_row_array[Config_leave_message::talker]);
            $array_message[] = array(
                'description' => $temp_database_row_array[Config_leave_message::content],
                'time' => get_time($temp_database_row_array[Config_leave_message::time]),
                'nickname' => $temp_user[Config_user::log_name],
                'img' => 'upload/avatar.png',
            );
        }
        mysqli_free_result($retval);
        return $array_message;
    }