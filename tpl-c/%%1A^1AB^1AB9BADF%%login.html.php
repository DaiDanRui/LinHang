<?php /* Smarty version 2.6.27, created on 2016-01-19 08:39:19
         compiled from login.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/loginVerify.js"></script>
    <title>登录</title>
</head>
<body>
<div class="form_login">
    <div class="head">
        LGDreamer
    </div>
    <form id="login_form" name="login_form" action="Login.php" method="post" onchange="verify()">
        <table id="login_table">
            <tr>
                <td class="td1">
                    <input class="form_input" id="login_user" name="username" value="登录用户名"/>
                </td>
            </tr>
            <tr>
                <td class="td1">
                    <input class="form_input" id="login_pwd" name="pwd" value="密码"/>
                </td>
            </tr>
            <tr>
                <td class="td2">
                    <button class="login_bt" name="login" >登录</button>
                </td>
            </tr>
        </table>
        <div class="bottom">
            <button id="forget" name="forget">忘记密码</button>
            <button id="reg" name="reg">立即注册-></button>
        </div>
    </form>
    <div>
        <div id="login_err1">123</div>
        <div id="login_err2">234</div>
    </div>
</div>
</body>
</html>