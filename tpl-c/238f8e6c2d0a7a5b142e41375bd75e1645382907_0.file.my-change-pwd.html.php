<?php
/* Smarty version 3.1.29, created on 2016-03-13 04:59:20
  from "/Applications/MAMP/htdocs/LinHang/tpl/My/my-change-pwd.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e4e5988f0a35_04004987',
  'file_dependency' => 
  array (
    '238f8e6c2d0a7a5b142e41375bd75e1645382907' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/My/my-change-pwd.html',
      1 => 1457833193,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e4e5988f0a35_04004987 ($_smarty_tpl) {
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
 type="text/javascript" src="js/validate.js"><?php echo '</script'; ?>
>
    <title>我的-修改密码</title>
</head>
<body>
<div class="wrapper">
    <div class="nav">
        <a class="sets" onclick="history.go(-1)">
            <img src="img/sets-back.png">
        </a>
        <h1 class="nav-title">密码修改</h1>
    </div>
    <form action="My_pwd_change.php" method="post">
    <div class="contents contents-3">

        <div class="item-5">
            <h1>原密码&nbsp;&nbsp;&nbsp;</h1>
            <input class="sp-1" type="password" name="old">
        </div>
        <div class="item-5">
            <h1>新密码&nbsp;&nbsp;&nbsp;</h1>
            <input class="sp-1" type="password" name="new_pwd" id="new_pwd">
        </div>
        <div class="item-5">
            <h1>再次输入</h1>
            <input class="sp-2" type="password" name="new_pwd2" id="new_pwd2">
            <span id="respond">不一致</span>
        </div>

        <button class="bt" id="reset" type="reset" name="change">完成修改</button>

    </div>
    </form>
</div>

</body>
</html>
<?php }
}
