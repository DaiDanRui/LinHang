<?php /* Smarty version 2.6.27, created on 2016-01-19 08:50:28
         compiled from register1.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/register.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/registerVerify.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <title>注册step_1</title>
</head>
<body onload="init()">
    <div class="form_register" id="reg1">
        <form id="regist_form" name="regist_form" action="Register1.php" method="post" onchange="verify(this)">
            <table id="regist_table_1">
                <tr>
                    <td class="table_item">用户名</td>
                    <td><input class="input" id="register_user" name="input_user" type="text"/></td>
                </tr>
                <tr>
                    <td class="table_item">密码</td>
                    <td><input class="input" id="register_pwd" name="input_pwd" type="password"/></td>
                </tr>
                <tr>
                    <td class="table_item">再次密码</td>
                    <td><input class="input" id="register_pwd_again" name="input_pwd_again" type="password"/></td>
                </tr>
            </table>
            <div class="bottom">
                <button id="return" type="submit" name="return">返回登录</button>
                <button id="next" type="submit" name="next" onsubmit="value = verify(this)">下一页-></button>
            </div>
            <div class="inline">
                <div id="register_err1">用户名为空</div>
                <div id="register_err2">密码为空</div>
                <div id="register_err3">再次输入密码为空</div>
                <div id="register_err4">两次输入不一致</div>
            </div>
        </form>
    </div>
</body>
</html>