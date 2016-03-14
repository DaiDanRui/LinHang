<?php
/* Smarty version 3.1.29, created on 2016-03-13 10:19:18
  from "/Applications/MAMP/htdocs/LinHang/tpl/My/my-accepted.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e53096cb1bb7_87924361',
  'file_dependency' => 
  array (
    '37aa39fe376e54621c0c8b626284a1dc03b2049f' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/My/my-accepted.html',
      1 => 1457859429,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e53096cb1bb7_87924361 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/main.js"><?php echo '</script'; ?>
>
    <title>我的-被接受的</title>
</head>
<body>
<div class="wrapper">
    <div class="nav">
        <a class="sets" onclick="history.go(-1)">
            <img src="img/sets-back.png">
        </a>
        <h1 class="nav-title">被接受的</h1>
    </div>

    <div class="contents contents-5">

    <?php
$_from = $_smarty_tpl->tpl_vars['accepts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_accept_0_saved_item = isset($_smarty_tpl->tpl_vars['accept']) ? $_smarty_tpl->tpl_vars['accept'] : false;
$_smarty_tpl->tpl_vars['accept'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['accept']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['accept']->value) {
$_smarty_tpl->tpl_vars['accept']->_loop = true;
$__foreach_accept_0_saved_local_item = $_smarty_tpl->tpl_vars['accept'];
?>
    <div class="item-3 item-4">
        <div class="head">
            <img class="img-to-set" src="<?php echo $_smarty_tpl->tpl_vars['accept']->value['url_header'];?>
">
            <h1><?php echo $_smarty_tpl->tpl_vars['accept']->value['acceptor'];?>
</h1>
        </div>
        <div class="middle">
            <img class="img-to-set-2" src="<?php echo $_smarty_tpl->tpl_vars['accept']->value['url_pic'];?>
">
            <h1 class="h1-title"><?php echo $_smarty_tpl->tpl_vars['accept']->value['title'];?>
</h1>
            <h1 class="h1-price">$&nbsp;<?php echo $_smarty_tpl->tpl_vars['accept']->value['price'];?>
</h1>
        </div>
        <div class="bottom">
            <h2>2016-01-01</h2>
            <a class="right" href="My_to_review.php?id=<?php echo $_smarty_tpl->tpl_vars['accept']->value['id'];?>
">
                <div class="edit">
                    <img src="img/icon-edit.png">
                </div>
                <h2>&nbsp;去评价</h2>
            </a>
        </div>
    </div>
    <?php
$_smarty_tpl->tpl_vars['accept'] = $__foreach_accept_0_saved_local_item;
}
if ($__foreach_accept_0_saved_item) {
$_smarty_tpl->tpl_vars['accept'] = $__foreach_accept_0_saved_item;
}
?>
    </div>

    <div class="nav-bottom">
        <a class="bt-bottom bt-bottom-2" href="My_transaction?type=skill">技能</a>
        <a class="bt-bottom bt-bottom-2" href="My_transaction?type=reward">悬赏</a>
    </div>
</div>

</body>
</html><?php }
}
