<?php
/* Smarty version 3.1.29, created on 2016-03-12 04:34:28
  from "/Applications/MAMP/htdocs/LinHang/tpl/Login&Register/Login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e38e4463c6b8_53460783',
  'file_dependency' => 
  array (
    '02e139fa1d34e041229058e68254ffa74b50628a' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/Login&Register/Login.html',
      1 => 1457753560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e38e4463c6b8_53460783 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/common.css" type="text/css" rel="stylesheet">

    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.12.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/validate.js"><?php echo '</script'; ?>
>

    <title>登录</title>
</head>
<body>
    <div class="contents">
        <div class="common-head">
            <img src="img/LG.png">
        </div>
        <form method="post" action="Login.php" onsubmit="return checkLogin();return false;">
        <div class="content">
            <input class="input-out input-in-login" name="username" id="username" placeholder="用户名"/>
            <input class="input-out input-in-login" name="pwd" id="pwd" placeholder="密码"/>
            <button class="input-out input-in-login btn-login" type="submit" name="login" id="login">登录</button>
            <div class="login-bot">
                <a class="a-common forget" href="#">忘记密码?</a>
                <a class="a-common reg" href="Register.php">立即注册-></a>
            </div>
        </div>
        </form>
    </div>
    <div class="footer">
        Designed &copy; 2016 LGDreamer
    </div>
</body>
</html><?php }
}
