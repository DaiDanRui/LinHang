<?php
/* Smarty version 3.1.29, created on 2016-03-13 07:51:08
  from "/Applications/MAMP/htdocs/LinHang/tpl/My/my-main.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e50ddc5dcf05_20881739',
  'file_dependency' => 
  array (
    '4374efb1f55f07d3a12fa0821fd2782fd3570f06' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/My/my-main.html',
      1 => 1457851866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e50ddc5dcf05_20881739 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <link href="css/my.css" type="text/css" rel="stylesheet"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/main.js"><?php echo '</script'; ?>
>
    <title>我的-主页</title>
</head>
<body>
<div class="wrapper back-color">
    <div class="my-head">
        <a href="My_personal_info.php"><img class="img-to-set" src="<?php echo $_smarty_tpl->tpl_vars['my_main']->value['url_header'];?>
"></a>
        <div class="head-right">
            <h1 class="my-comment">买家好评: &nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['my_main']->value['good_buyer'];?>
%</h1>
            <h1 class="my-comment">卖家好评: &nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['my_main']->value['good_seller'];?>
%</h1>
        </div>
        <div class="head-name">
            <p class="my-name"><?php echo $_smarty_tpl->tpl_vars['my_main']->value['username'];?>
</p>
        </div>
    </div>
    <div class="my-content">
        <div class="cards">
            <div class="one-card first-card">
                <div class="one-card-img"><img src="img/icon-circle1.png" class="my-main-icon"></div>
                <a class="my-item-link" href="My_publish.php"><div class="my-items">&nbsp;我发布的&nbsp;>></div></a>
            </div>
            <div class="one-card">
                <div class="one-card-img"><img src="img/icon-circle2.png" class="my-main-icon"></div>
                <a class="my-item-link" href="My_transaction.php"><div class="my-items">&nbsp;被接受的&nbsp;>></div></a>
            </div>
            <div class="one-card">
                <div class="one-card-img"><img src="img/icon-circle3.png" class="my-main-icon"></div>
                <a class="my-item-link" href="My_evaluation.php"><div class="my-items">&nbsp;评价详情&nbsp;>></div></a>
            </div>
            <div class="one-card">
                <div class="one-card-img"><img src="img/icon-circle4.png" class="my-main-icon"></div>
                <a class="my-item-link" href="My_account.php"><div class="my-items">&nbsp;我的账户&nbsp;>></div></a>
            </div>
            <div class="one-card">
                <div class="one-card-img"><img src="img/icon-circle5.png" class="my-main-icon"></div>
                <a class="my-item-link" href="My_star.php"><div class="my-items">&nbsp;我的收藏&nbsp;>></div></a>
            </div>
            <div class="one-card">
                <div class="one-card-img"><img src="img/icon-circle1.png" class="my-main-icon"></div>
                <a class="my-item-link" href="My_set.php"><div class="my-items">&nbsp;设置&nbsp;>></div></a>
            </div>
        </div>
    </div>
    <div class="nav-bottom">
        <a class="bt-bottom" href="Commodity_browse.php?type=market">市场</a>
        <a class="bt-bottom" href="Commodity_browse.php?type=reward">悬赏</a>
        <a class="bt-bottom" href="My_main.php">我的</a>
    </div>
</div>
</body>
</html><?php }
}
