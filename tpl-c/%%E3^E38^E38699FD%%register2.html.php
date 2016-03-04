<?php /* Smarty version 2.6.27, created on 2016-01-19 09:05:48
         compiled from register2.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/register.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/register2Verify.js"></script>
    <title>注册step_2</title>
</head>
<body onload="init()">
<div class="form_register" id="reg2">
    <form id="regist_form" name="regist_form" action="Register2.php" method="post" onchange="verify()">
        <table id="regist_table">
            <tr>
                <td class="table_item">学校</td>
                <td>
                    <!--<input class="input" id="input_sch" name="input_sch" type="text"/>-->
                    <select class="input" name="input_sch">
                        <option value="nju">南京大学</option>
                        <option value="pku">北京大学</option>
                        <option value="tsu">清华大学</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="table_item">学号</td>
                <td><input class="input" id="register_stu_id" name="input_stu_id" type="text"/></td>
            </tr>
            <tr>
                <td class="table_item">姓名</td>
                <td><input class="input" id="register_name" name="input_name" type="text"/></td>
            </tr>
            <tr>
                <td class="table_item">性别</td>
                <td>
                    <label class="table_item"><input name="sex" type="radio" value="0" checked="checked"/>男&nbsp&nbsp&nbsp&nbsp</label>
                    <label class="table_item"><input name="sex" type="radio" value="1"/>女</label>
                </td>
            </tr>
        </table>
        <div class="bottom">
            <button id="return" name="return">上一页</button>
            <button id="next" name="next">下一页-></button>
        </div>
        <div>
            <div class="register_err" id="register_err5">学号为空</div>
            <div class="register_err" id="register_err6">姓名为空</div>
        </div>
    </form>
</div>
</body>
</html>