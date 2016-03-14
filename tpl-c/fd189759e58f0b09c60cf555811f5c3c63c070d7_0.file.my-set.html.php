<?php
/* Smarty version 3.1.29, created on 2016-03-13 04:32:30
  from "/Applications/MAMP/htdocs/LinHang/tpl/My/my-set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e4df4e8dd621_39402910',
  'file_dependency' => 
  array (
    'fd189759e58f0b09c60cf555811f5c3c63c070d7' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/My/my-set.html',
      1 => 1457839950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e4df4e8dd621_39402910 ($_smarty_tpl) {
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
    <title>我的-设置</title>
</head>
<body>
<div class="wrapper back-color">
    <div class="nav">
        <a class="sets" onclick="history.go(-1)">
            <img src="img/sets-back.png">
        </a>
        <h1 class="nav-title">设置</h1>
    </div>
    <div class="my-content-3">
        <div class="cards cards-2">
            <div class="one-card one-card-3">
                <div class="one-card-img"><img src="img/icon-circle1.png"></div>
                <a class="my-item-link" href="My_account_set.php">&nbsp;账号设置&nbsp;>></a>
            </div>
            <div class="one-card one-card-3">
                <div class="one-card-img"><img src="img/icon-circle2.png"></div>
                <a class="my-item-link" >&nbsp;更改个人资料&nbsp;>></a>
            </div>
            <div class="one-card one-card-3">
                <div class="one-card-img"><img src="img/icon-circle3.png"></div>
                <a class="my-item-link" >&nbsp;主题设置&nbsp;>></a>
            </div>
            <div class="one-card one-card-3">
                <div class="one-card-img"><img src="img/icon-circle4.png"></div>
                <a class="my-item-link" >&nbsp;关于我们&nbsp;>></a>
            </div>
        </div>
    </div>

    <div class="confirm-bottom confirm-bottom-2">
        <button>
            退出账号
        </button>
    </div>
</div>

</body>
</html><?php }
}
