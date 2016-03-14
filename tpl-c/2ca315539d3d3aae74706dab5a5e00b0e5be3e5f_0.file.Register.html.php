<?php
/* Smarty version 3.1.29, created on 2016-03-12 04:42:42
  from "/Applications/MAMP/htdocs/LinHang/tpl/Login&Register/Register.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e39032a6eeb7_08702446',
  'file_dependency' => 
  array (
    '2ca315539d3d3aae74706dab5a5e00b0e5be3e5f' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/Login&Register/Register.html',
      1 => 1457753560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e39032a6eeb7_08702446 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/common.css" type="text/css" rel="stylesheet"/>

    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.12.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/validate.js"><?php echo '</script'; ?>
>
    <title>注册-个性-3</title>
</head>
<body>
<div class="contents">
    <div class="register-head-3 register-head">
        <img src="img/reg-must.png">
    </div>
    <div class="register-content">
        <!--<div class="next back">-->
            <!--<a href="Register2.php">-->
                <!--<img src="img/left.png">-->
            <!--</a>-->
        <!--</div>-->
        <form method="post" action="Register.php" onsubmit="return checkRegister();return false;">
        <div class="input-out block">
            <div class="block-in-reg-2 input-in-login">
                用户名&nbsp;<input class="input-out input-in-reg" type="text" name="username" id="username"/>
            </div>
            <div class="block-in-reg-2 input-in-login">
                密码&nbsp;&nbsp;&nbsp;&nbsp;<input class="input-out input-in-reg" type="password" name="pwd" id="pwd"/>
            </div>
            <div class="block-in-reg-2 input-in-login">
                再次&nbsp;&nbsp;&nbsp;&nbsp;<input class="input-out input-in-reg" type="password" name="pwd_again" id="pwd_again"/>
            </div>
            <div class="block-in-reg-2 input-in-login">
                手机&nbsp;&nbsp;&nbsp;&nbsp;<input class="input-out input-in-reg" type="text" name="phone" id="phone"/>
            </div>
        </div>

        <button class="input-out input-in-login btn-login btn-reg" name="reg" id="reg" type="submit">完成注册</button>

        </form>
    </div>
</div>
<div class="footer">
    Designed &copy; 2016 LGDreamer
</div>
</body>
</html><?php }
}
