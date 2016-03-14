<?php
/* Smarty version 3.1.29, created on 2016-03-13 03:40:14
  from "/Applications/MAMP/htdocs/LinHang/tpl/My/my-personal.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e4d30e7f3102_93664491',
  'file_dependency' => 
  array (
    '1db90029515b8e42aa003c7d99696e347334f9a4' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/My/my-personal.html',
      1 => 1457836813,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e4d30e7f3102_93664491 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <link href="css/my.css" type="text/css" rel="stylesheet"/>
    <title>我的-个人信息</title>
</head>
<body>
<div class="wrapper">
    <div class="my-per-head">
        <img class="cover-all" src="img/back-3.png">
    </div>
    <div class="my-per-content">
        <div class="per-top">
            <img id="per-top" src="<?php echo $_smarty_tpl->tpl_vars['my_personal']->value['url_header'];?>
">
            <h2 class="my-per-comment">买家好评 : <?php echo $_smarty_tpl->tpl_vars['my_personal']->value['good_buyer'];?>
 %</h2>
            <h2 class="my-per-comment">卖家好评 : <?php echo $_smarty_tpl->tpl_vars['my_personal']->value['good_seller'];?>
 %</h2>
            <div class="per-top-bottom">
                <img src="img/icon-edit.png">
                <h1><?php echo $_smarty_tpl->tpl_vars['my_personal']->value['introduction'];?>
是对方是个</h1>
            </div>

        </div>
        <div class="per-content">
            <table>
                <tr class="my-per-item tr-content">
                    <td class="td-img1"></td>
                    <td><h1>昵称:</h1></td>
                    <td class="td-len"><h1>&nbsp;<?php echo $_smarty_tpl->tpl_vars['my_personal']->value['nickname'];?>
</h1></td>
                </tr>
                <tr class="my-per-item tr-content">
                    <td class="td-img2"></td>
                    <td><h1>姓名:</h1></td>
                    <td class="td-len"><h1>&nbsp;<?php echo $_smarty_tpl->tpl_vars['my_personal']->value['username'];?>
</h1></td>
                </tr>
                <tr class="my-per-item tr-content">
                    <td class="td-img3"></td>
                    <td><h1>性别:</h1></td>
                    <td class="td-len"><h1>&nbsp;<?php echo $_smarty_tpl->tpl_vars['my_personal']->value['gender'];?>
</h1></td>
                </tr>
                <tr class="my-per-item tr-content">
                    <td class="td-img4"></td>
                    <td><h1>手机:</h1></td>
                    <td class="td-len"><h1>&nbsp;<?php echo $_smarty_tpl->tpl_vars['my_personal']->value['phone'];?>
</h1></td>
                </tr>
                <tr class="my-per-item tr-content">
                    <td class="td-img5"></td>
                    <td><h1>邮箱:</h1></td>
                    <td class="td-len"><h1>&nbsp;<?php echo $_smarty_tpl->tpl_vars['my_personal']->value['email'];?>
</h1></td>
                </tr>
                <tr class="my-per-item tr-content">
                    <td class="td-img1"></td>
                    <td><h1>生日:</h1></td>
                    <td class="td-len"><h1>&nbsp;<?php echo $_smarty_tpl->tpl_vars['my_personal']->value['birth'];?>
</h1></td>
                </tr>
                <tr class="my-per-item tr-content">
                    <td class="td-img2"></td>
                    <td><h1>擅长:</h1></td>
                    <td class="td-len"><h1>&nbsp;<?php echo $_smarty_tpl->tpl_vars['my_personal']->value['good_at'];?>
</h1></td>
                </tr>
                <tr class="my-per-item tr-content">
                    <td class="td-img3"></td>
                    <td><h1>爱好:</h1></td>
                    <td class="td-len"><h1>&nbsp;<?php echo $_smarty_tpl->tpl_vars['my_personal']->value['hobby'];?>
</h1></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html><?php }
}
