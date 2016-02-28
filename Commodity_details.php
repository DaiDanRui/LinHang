<?php
require_once 'class/DBtraverser.php';
require_once 'class/Config_commodity.php';
require_once 'class/Injection.php';
include_once ('smarty_init.php');

$where = ' where '.Config_commodity::id.' = '.Injection::excute('id');
$DBtraverser = new DBtraverser(Config_commodity::table_name,$where);
$result = $DBtraverser->excute_without_conn();
$array = mysqli_fetch_array($result, MYSQLI_ASSOC);

$smarty->assign('array',$array);
$smarty->display('');

mysqli_free_result($result);