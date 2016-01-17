<?php
/**
 * Created by PhpStorm.
 * User: raychen
 * Date: 16/1/17
 * Time: 19:30
 */

include_once("smarty_init.php");

$t = "cr";

$smarty->assign('test',$t);
$smarty->display("Main.html");