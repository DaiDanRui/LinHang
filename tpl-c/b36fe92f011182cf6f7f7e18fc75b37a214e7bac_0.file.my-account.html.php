<?php
/* Smarty version 3.1.29, created on 2016-03-13 09:07:51
  from "/Applications/MAMP/htdocs/LinHang/tpl/My/my-account.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e51fd7928d33_19241818',
  'file_dependency' => 
  array (
    'b36fe92f011182cf6f7f7e18fc75b37a214e7bac' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/My/my-account.html',
      1 => 1457856471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e51fd7928d33_19241818 ($_smarty_tpl) {
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
    <title>我的-我的账户</title>
</head>
<body>
<div class="wrapper back-color">
    <div class="nav">
        <a class="sets" onclick="history.go(-1)">
            <img src="img/sets-back.png">
        </a>
        <h1 class="nav-title">我的账户</h1>
    </div>
    <div class="contents-6">
        <div class="head">
            <img class="img-to-set" src="<?php echo $_smarty_tpl->tpl_vars['account']->value['url_header'];?>
">
            <div class="right">
                <h1>总收入&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;￥<?php echo $_smarty_tpl->tpl_vars['account']->value['income'];?>
</h1>
                <h1>总支出&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;￥<?php echo $_smarty_tpl->tpl_vars['account']->value['outcome'];?>
</h1>
            </div>
        </div>
        <div class="middle">
            <div class="item-6">
                <?php
$_from = $_smarty_tpl->tpl_vars['accounts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_account_0_saved_item = isset($_smarty_tpl->tpl_vars['account']) ? $_smarty_tpl->tpl_vars['account'] : false;
$_smarty_tpl->tpl_vars['account'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['account']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->_loop = true;
$__foreach_account_0_saved_local_item = $_smarty_tpl->tpl_vars['account'];
?>
                <img src="img/icon-timeline.png">
                <div class="card-2">
                    <div class="head">
                        <h2 class="sp-3"><?php echo $_smarty_tpl->tpl_vars['account']->value['time'];?>
</h2>
                    </div>
                    <div class="middle">
                        <h1><?php echo $_smarty_tpl->tpl_vars['account']->value['type'];?>
:<?php echo $_smarty_tpl->tpl_vars['account']->value['title'];?>
</h1>
                    </div>
                    <div class="bottom">
                        <h2 class="sp-3 sp-4">From <?php echo $_smarty_tpl->tpl_vars['account']->value['trader'];?>
</h2>
                        <h2 class="sp-3 sp-4 sp-5"><?php echo $_smarty_tpl->tpl_vars['account']->value['price_type'];?>
&nbsp;:&nbsp;&nbsp;￥<?php echo $_smarty_tpl->tpl_vars['account']->value['price'];?>
</h2>
                    </div>
                </div>
                <?php
$_smarty_tpl->tpl_vars['account'] = $__foreach_account_0_saved_local_item;
}
if ($__foreach_account_0_saved_item) {
$_smarty_tpl->tpl_vars['account'] = $__foreach_account_0_saved_item;
}
?>
            </div>
        </div>
    </div>
</div>
</body>
</html><?php }
}
