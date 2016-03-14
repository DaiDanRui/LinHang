<?php
/* Smarty version 3.1.29, created on 2016-03-13 05:05:32
  from "/Applications/MAMP/htdocs/LinHang/tpl/My/my-star.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e4e70ca7e630_64925026',
  'file_dependency' => 
  array (
    '9f50165ad4a194888d60f956c18537d51beb9990' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/My/my-star.html',
      1 => 1457841931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e4e70ca7e630_64925026 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <title>市场-主页</title>
</head>
<body>
<div class="wrapper">
    <div class="nav">
        <a class="sets" onclick="history.go(-1)">
            <img src="img/sets-back.png">
        </a>
        <h1 class="nav-title">我的收藏</h1>
    </div>

    <div class="contents contents-5">
        <?php
$_from = $_smarty_tpl->tpl_vars['my_stars']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_my_star_0_saved_item = isset($_smarty_tpl->tpl_vars['my_star']) ? $_smarty_tpl->tpl_vars['my_star'] : false;
$_smarty_tpl->tpl_vars['my_star'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['my_star']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['my_star']->value) {
$_smarty_tpl->tpl_vars['my_star']->_loop = true;
$__foreach_my_star_0_saved_local_item = $_smarty_tpl->tpl_vars['my_star'];
?>
        <div class="item item-2">
            <div class="item-header-main">
                <img src="<?php echo $_smarty_tpl->tpl_vars['my_star']->value['url'];?>
">
                <a href="Commodity_details.php?id=<?php echo $_smarty_tpl->tpl_vars['my_star']->value['id'];?>
"><h1><?php echo $_smarty_tpl->tpl_vars['my_star']->value['title'];?>
</h1></a>
                <div class="price">￥<?php echo $_smarty_tpl->tpl_vars['my_star']->value['price'];?>
</div>
            </div>
            <div class="item-content item-content-2">
                <p>
                    <?php echo $_smarty_tpl->tpl_vars['my_star']->value['description'];?>

                </p>
                <?php
$_from = $_smarty_tpl->tpl_vars['my_star']->value['imgs'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_url_1_saved_item = isset($_smarty_tpl->tpl_vars['url']) ? $_smarty_tpl->tpl_vars['url'] : false;
$_smarty_tpl->tpl_vars['url'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['url']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['url']->value) {
$_smarty_tpl->tpl_vars['url']->_loop = true;
$__foreach_url_1_saved_local_item = $_smarty_tpl->tpl_vars['url'];
?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
                <?php
$_smarty_tpl->tpl_vars['url'] = $__foreach_url_1_saved_local_item;
}
if ($__foreach_url_1_saved_item) {
$_smarty_tpl->tpl_vars['url'] = $__foreach_url_1_saved_item;
}
?>
            </div>
            <div class="item-bottom">
                <h2><?php echo $_smarty_tpl->tpl_vars['my_star']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['my_star']->value['time'];?>
天前)</h2>
                <h3><?php echo $_smarty_tpl->tpl_vars['my_star']->value['star_numbers'];?>
</h3>
                <img src="img/icon-save.png">
                <h3><?php echo $_smarty_tpl->tpl_vars['my_star']->value['message_numbers'];?>
</h3>
                <img src="img/icon-msg.png">
            </div>
        </div>
        <?php
$_smarty_tpl->tpl_vars['my_star'] = $__foreach_my_star_0_saved_local_item;
}
if ($__foreach_my_star_0_saved_item) {
$_smarty_tpl->tpl_vars['my_star'] = $__foreach_my_star_0_saved_item;
}
?>
    </div>

    <div class="nav-bottom">
        <a class="bt-bottom bt-bottom-2">技能</a>
        <a class="bt-bottom bt-bottom-2">悬赏</a>
    </div>
    <!--<div class="menu-left">-->
    <!--<div class="head"></div>-->
    <!--<div class="content">-->
    <!--<div class="menu-item">-->
    <!--<div class="icon"></div>-->
    <!--<div class="icon-name">学习</div>-->
    <!--</div>-->
    <!--<div class="menu-item">-->
    <!--<div class="icon"></div>-->
    <!--<div class="icon-name">学习</div>-->
    <!--</div>-->
    <!--<div class="menu-item">-->
    <!--<div class="icon"></div>-->
    <!--<div class="icon-name">学习</div>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
</div>
</body>
</html><?php }
}
