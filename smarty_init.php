<?php 
include_once("smarty/Smarty.class.php"); //包含smarty类文件
$smarty = new Smarty(); //建立smarty实例对象$smarty

$smarty->caching=false; //是否使用缓存，项目在调试期间，不建议启用缓

$smarty->config_dir="configs";
$smarty->template_dir = "tpl"; //设置模板目录
$smarty->compile_dir = "tpl-c"; //设置编译目录
$smarty->cache_dir = "caches"; //缓存文件夹

$smarty->left_delimiter = "{%";
$smarty->right_delimiter = "%}";
?>