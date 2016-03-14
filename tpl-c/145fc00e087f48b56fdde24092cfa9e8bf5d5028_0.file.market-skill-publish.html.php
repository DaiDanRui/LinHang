<?php
/* Smarty version 3.1.29, created on 2016-03-13 15:01:25
  from "D:\WWW\LinHang\tpl\Reward&Market\market-skill-publish.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e51045b3a3c2_98160153',
  'file_dependency' => 
  array (
    '145fc00e087f48b56fdde24092cfa9e8bf5d5028' => 
    array (
      0 => 'D:\\WWW\\LinHang\\tpl\\Reward&Market\\market-skill-publish.html',
      1 => 1457852484,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e51045b3a3c2_98160153 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <link href="css/webuploader.css" type="text/css" rel="stylesheet"/>

    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.12.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js//webuploader.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/upload2.js"><?php echo '</script'; ?>
>
    <title>市场-发布技能</title>
</head>
<body>
<div class="wrapper">
    <div class="nav">
        <a class="sets" onclick="history.go(-1)">
            <img src="img/sets-back.png">
        </a>
        <h1 class="nav-title">发布技能</h1>
    </div>
    <div class="contents-4">
        <form method="post" action="Commodity_upload.php">
            <div class="content-wrapper">
                <div class="topic">
                    <h1>主题</h1>
                    <input class="publish-input-out" placeholder="请输入" name="topic" id="topic">
                </div>
                <textarea class="publish-input-out area" placeholder="简要描述~" name="description" id="description"></textarea>




                <div id="itemList" >
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker"></div>
                </div>




                <div class="topic cont-bottom">
                    <h1>截止日期</h1>
                    <input class="publish-input-out" name="time" id="time">
                </div>
                <div class="topic cont-bottom">
                    <h1>报酬</h1>
                    <input class="publish-input-out" name="price" id="price">
                </div>
                <div class="topic cont-bottom">
                    <h1>联系方式</h1>
                    <input class="publish-input-out" name="phone" id="phone">
                </div>
            </div>

            <div class="confirm-bottom">
                <button name="confirm" id="confirm" type="submit">
                    确认
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html><?php }
}
