<?php
/* Smarty version 3.1.29, created on 2016-03-13 04:47:56
  from "/Applications/MAMP/htdocs/LinHang/tpl/My/my-account-set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e4e2ecb5daf7_68661210',
  'file_dependency' => 
  array (
    '106befcd5694ffe776606938efb8ebd61bce12e4' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/My/my-account-set.html',
      1 => 1457840872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e4e2ecb5daf7_68661210 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <link href="css/my.css" type="text/css" rel="stylesheet"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.12.0.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/main.js"><?php echo '</script'; ?>
>
    <title>我的-账号设置</title>
</head>
<body>
<div class="wrapper back-color">
    <div class="nav">
        <a class="sets" onclick="history.go(-1)">
            <img src="img/sets-back.png">
        </a>
        <h1 class="nav-title">账号设置</h1>
    </div>
    <div class="my-content-2">
        <div class="cards cards-2">
            <div class="one-card one-card-2">
                <div class="one-card-img"><img src="img/icon-circle1.png"></div>
                <a class="my-item-link" href="My_pwd_change.php">&nbsp;密码修改&nbsp;>></a>
            </div>
            <div class="one-card one-card-2">
                <div class="one-card-img"><img src="img/icon-circle4.png"></div>
                <a class="my-item-link" >&nbsp;绑定手机修改&nbsp;>></a>
            </div>
            <div class="one-card one-card-2">
                <div class="one-card-img"><img src="img/icon-circle3.png"></div>
                <a class="my-item-link" >&nbsp;账号安全&nbsp;>></a>
            </div>
        </div>
    </div>

</div>

</body>
</html><?php }
}
