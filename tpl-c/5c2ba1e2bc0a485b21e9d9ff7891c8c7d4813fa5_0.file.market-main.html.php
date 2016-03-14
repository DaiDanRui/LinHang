<?php
/* Smarty version 3.1.29, created on 2016-03-13 15:02:57
  from "D:\WWW\LinHang\tpl\Reward&Market\market-main.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e510a1ade593_17784746',
  'file_dependency' => 
  array (
    '5c2ba1e2bc0a485b21e9d9ff7891c8c7d4813fa5' => 
    array (
      0 => 'D:\\WWW\\LinHang\\tpl\\Reward&Market\\market-main.html',
      1 => 1457852425,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e510a1ade593_17784746 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/main.js"><?php echo '</script'; ?>
>
    <title>市场-主页</title>
</head>
<body>
<form method="post" action="Commodity_browse.php">
    <div class="wrapper">
        <div class="nav nav-2">
            <a class="sets sets-set" href="My_set.php">
                <img src="img/sets.png">
            </a>
            <div class="search-input-div">
                <div class="input-in"><input class="search-input" /></div>

            </div>
            <a class="sets sets-set sets-add" href="Commodity_upload.php">
                <img src="img/sets-add.png">
            </a>
        </div>
        <div class="nav">
            <a class="sets sets-2" id="ser-3">
                <img src="img/sets.png">
            </a>
            <a class="sets sets-2 sets-price" id="ser-1">
                <img src="img/sets-price.png">
            </a>
            <a class="sets sets-2 sets-time" id="ser-2">
                <img src="img/sets-time.png">
            </a>
        </div>

        <div class="contents contents-2">
            <?php
$_from = $_smarty_tpl->tpl_vars['items']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
            <div class="item">
                <div class="item-header-main">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
">
                    <a href="Commodity_details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><h1><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</h1></a>
                    <div class="price"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</div>
                </div>
                <div class="item-content item-content-2">
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

                    </p>
                    <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['imgs'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_url_1_saved_item = isset($_smarty_tpl->tpl_vars['url']) ? $_smarty_tpl->tpl_vars['url'] : false;
$_smarty_tpl->tpl_vars['url'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['url']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['url']->value) {
$_smarty_tpl->tpl_vars['url']->_loop = true;
$__foreach_url_1_saved_local_item = $_smarty_tpl->tpl_vars['url'];
?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
                    <?php
$_smarty_tpl->tpl_vars['url'] = $__foreach_url_1_saved_local_item;
}
if ($__foreach_url_1_saved_item) {
$_smarty_tpl->tpl_vars['url'] = $__foreach_url_1_saved_item;
}
?>
                </div>
                <div class="item-bottom">
                    <h2><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['item']->value['time'];?>
天前)</h2>
                    <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['star_numbers'];?>
</h3>
                    <img src="img/icon-save.png">
                    <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['message_numbers'];?>
</h3>
                    <img src="img/icon-msg.png">
                </div>
            </div>
            <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
        </div>

        <div class="nav-bottom">
            <a href="Commodity_browse.php?type=market" class="bt-bottom">市场</a>
            <a href="Commodity_browse.php?type=reward" class="bt-bottom">悬赏</a>
            <a href="My_main.php" class="bt-bottom">我的</a>
        </div>
        <div class="menu-left" tabindex="0" style="width: 0">
            <div class="head">
                <a onclick="leftBar_none()"><img src="img/sets-back.png"></a>
            </div>
            <div class="content" id="con1" style="display: none">
                <div class="menu-item">
                    <img src="img/icon-circle1.png">
                    <button type="submit" name="price-high">价格最高</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle2.png">
                    <button type="submit" name="price-low">价格最低</button>
                </div>
            </div>
            <div class="content" id="con2" style="display: none">
                <div class="menu-item">
                    <img src="img/icon-circle1.png">
                    <button type="submit" name="time-new">最新</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle2.png">
                    <button type="submit" name="time-old">最旧</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle3.png">
                    <button type="submit" name="time-day">三天内</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle4.png">
                    <button type="submit" name="time-week">一周内</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle5.png">
                    <button type="submit" name="time-month">一月内</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle1.png">
                    <button type="submit" name="time-halfYear">半年内</button>
                </div>
            </div>
            <div class="content" id="con3" style="display: none;">
                <div class="menu-item">
                    <img src="img/icon-circle1.png">
                    <button type="submit" name="type-math">数理化工</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle2.png">
                    <button type="submit" name="type-literature">文史哲</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle3.png">
                    <button type="submit" name="type-computer">计算机</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle4.png">
                    <button type="submit" name="type-music">音乐</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle5.png">
                    <button type="submit" name="type-paint">绘画</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle1.png">
                    <button type="submit" name="type-pe">体育</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle2.png">
                    <button type="submit" name="type-language">语言</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle3.png">
                    <button type="submit" name="type-amuse">娱乐</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle4.png">
                    <button type="submit" name="type-dance">舞蹈</button>
                </div>
                <div class="menu-item">
                    <img src="img/icon-circle5.png">
                    <button type="submit" name="type-other">其他</button>
                </div>
            </div>
        </div>
        <div class="right-cover">

        </div>
    </div>
</form>
</body>
</html><?php }
}
