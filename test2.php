<?php
/**
 * Created by PhpStorm.
 * User: raychen
 * Date: 16/3/5
 * Time: 10:14
 */

include_once 'smarty_init.php';

$arr = array();

$arr_sub1 = array(
    'username' => 'cr',
    'password' => '1234',
    'nickname' => 'top_cr',
    'phone' => '3211',
    'url' => 'img/test-3.jpg'
);

$arr_sub2 = array(
    'username' => 'cdn',
    'password' => '1233',
    'nickname' => 'top_cdn',
    'phone' => '6982'
);

$arr[0] = $arr_sub1;
$arr[1] = $arr_sub2;

$test = "hi";

$smarty->assign('skill',$arr);
//$smarty->assign('test',$test);
$smarty->display('Reward&Market/market-skill.html');
