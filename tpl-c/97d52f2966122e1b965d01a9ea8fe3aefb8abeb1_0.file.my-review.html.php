<?php
/* Smarty version 3.1.29, created on 2016-03-12 21:30:45
  from "D:\WWW\LinHang\tpl\My\my-review.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e41a0547c1d4_34947049',
  'file_dependency' => 
  array (
    '97d52f2966122e1b965d01a9ea8fe3aefb8abeb1' => 
    array (
      0 => 'D:\\WWW\\LinHang\\tpl\\My\\my-review.html',
      1 => 1457786744,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e41a0547c1d4_34947049 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.12.0.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/main.js"><?php echo '</script'; ?>
>
    <title>我的-评价详情</title>
</head>
<body>
<div class="wrapper">
    <div class="nav">
        <a class="sets">
            <img src="img/sets-back.png">
        </a>
        <h1 class="nav-title">评价详情</h1>
    </div>

    <div class="contents contents-5">
        <?php
$_from = $_smarty_tpl->tpl_vars['reviews']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_review_0_saved_item = isset($_smarty_tpl->tpl_vars['review']) ? $_smarty_tpl->tpl_vars['review'] : false;
$_smarty_tpl->tpl_vars['review'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['review']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['review']->value) {
$_smarty_tpl->tpl_vars['review']->_loop = true;
$__foreach_review_0_saved_local_item = $_smarty_tpl->tpl_vars['review'];
?>
        <div class="item-3">
            <div class="head">
                <img src="<?php echo $_smarty_tpl->tpl_vars['review']->value['url_header'];?>
">
                <h1><?php echo $_smarty_tpl->tpl_vars['review']->value['username'];?>
</h1>
                <h2>for me</h2>
            </div>
            <div class="middle">
                <h1 class="title"><?php echo $_smarty_tpl->tpl_vars['review']->value['title'];?>
</h1>
                <h1 class="h1-price">￥&nbsp;<?php echo $_smarty_tpl->tpl_vars['review']->value['price'];?>
</h1>
                <table>
                    <tr>
                        <td><h2>学习能力</h2></td>
                        <td><h2>:&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['review']->value['point_study'];?>
</h2></td>
                        <td><h2>认真度</h2></td>
                        <td><h2>:&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['review']->value['point_care'];?>
</h2></td>
                    </tr>
                    <tr>
                        <td><h2>总体</h2></td>
                        <td><h2>:&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['review']->value['point_total'];?>
</h2></td>
                    </tr>
                </table>
            </div>
            <div class="bottom">
                <h2><?php echo $_smarty_tpl->tpl_vars['review']->value['time'];?>
</h2>
            </div>
        </div>
        <?php
$_smarty_tpl->tpl_vars['review'] = $__foreach_review_0_saved_local_item;
}
if ($__foreach_review_0_saved_item) {
$_smarty_tpl->tpl_vars['review'] = $__foreach_review_0_saved_item;
}
?>
    </div>

    <div class="nav-bottom">
        <a class="bt-bottom bt-bottom-2"><h2>我的评价</h2></a>
        <a class="bt-bottom bt-bottom-2"><h2>收到的评价</h2></a>
    </div>
</div>

</body>
</html><?php }
}
