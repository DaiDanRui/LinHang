<?php
session_start();
require_once 'class/Config_commodity.php';


if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/Injection.php';
    require_once 'class/Picture_upload.php';
    if(Picture_upload::error_message()>0)
    {
        return;
    }
    else 
    {
        $pic_path = Picture_upload::save_picture(dirname(__FILE__).'upload/');
    }
    $commodity_message = Array
    (
        Config_commodity::course_or_reward  => Injection::excute('course_or_reward'),
        Config_commodity::type => Injection::excute('type')  ,
        Config_commodity::publisher => Injection::excute('publisher')     ,
        
        Config_commodity::price => Injection::excute('price')  ,
        Config_commodity::place => Injection::excute('place')  ,
        Config_commodity::release_date => Injection::excute('release_date') ,
        
        Config_commodity::title => Injection::excute('title'),
        Config_commodity::description => Injection::excute('description')  	,
        Config_commodity::pic_path => $pic_path  	,
        Config_commodity::commodity_state =>  0 ,
        Config_commodity::praise => 0
    );
    include_once('class/DBadder.php');
    $myDBadder = new DBadder(Config_commodity::table_name, $commodity_message);
    $myDBadder->excute_without_conn();
}else 
{
    include 'Login.php';
}