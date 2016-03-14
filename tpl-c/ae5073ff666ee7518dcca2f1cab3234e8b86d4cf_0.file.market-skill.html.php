<?php
/* Smarty version 3.1.29, created on 2016-03-13 09:54:52
  from "D:\WWW\LinHang\tpl\Reward&Market\market-skill.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e4c86ca42645_24022619',
  'file_dependency' => 
  array (
    'ae5073ff666ee7518dcca2f1cab3234e8b86d4cf' => 
    array (
      0 => 'D:\\WWW\\LinHang\\tpl\\Reward&Market\\market-skill.html',
      1 => 1457832569,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e4c86ca42645_24022619 ($_smarty_tpl) {
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
    <title>市场-技能详情</title>
</head>
<body>
<p style="display: none" id="skill_id"><?php echo $_smarty_tpl->tpl_vars['skill']->value['id'];?>
</p>
    <div class="wrapper">
        <div class="nav">
            <a class="sets" onclick="history.go(-1)">
                <img src="img/sets-back.png">
            </a>
            <h1 class="nav-title"><?php echo $_smarty_tpl->tpl_vars['skill']->value['nickname'];?>
的技能</h1>
        </div>

        <div class="contents">
            <div class="item-header">
                <img src="<?php echo $_smarty_tpl->tpl_vars['skill']->value['img'];?>
">
                <div class="titles">
                    <h1><?php echo $_smarty_tpl->tpl_vars['skill']->value['title'];?>
</h1>
                    <h3 class="sub-info"><?php echo $_smarty_tpl->tpl_vars['skill']->value['nickname'];?>
&nbsp;(<?php echo $_smarty_tpl->tpl_vars['skill']->value['time'];?>
天前)</h3>
                </div>
                <div class="price price-2"><?php echo $_smarty_tpl->tpl_vars['skill']->value['price'];?>
</div>
            </div>

            <div class="item-content">
                <p>
                    <?php echo $_smarty_tpl->tpl_vars['skill']->value['description'];?>

                </p>
            </div>
            <div class="picture">
                <img src="<?php echo $_smarty_tpl->tpl_vars['skill']->value['description-img'];?>
">
            </div>

            <div class="msg-total">
                <h2 class="img-num" id="star_num"><?php echo $_smarty_tpl->tpl_vars['skill']->value['star_numbers'];?>
</h2>
                <img src="img/icon-save.png">
                <h2 class="img-num"><?php echo $_smarty_tpl->tpl_vars['skill']->value['message_numbers'];?>
</h2>
                <img src="img/icon-msg.png">
            </div>
            <?php
$_from = $_smarty_tpl->tpl_vars['messages']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_message_0_saved_item = isset($_smarty_tpl->tpl_vars['message']) ? $_smarty_tpl->tpl_vars['message'] : false;
$_smarty_tpl->tpl_vars['message'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['message']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
$__foreach_message_0_saved_local_item = $_smarty_tpl->tpl_vars['message'];
?>
            <div class="msg-item-head">
                <img class="msg-icon" src="<?php echo $_smarty_tpl->tpl_vars['message']->value['img'];?>
">
                <h2 class="msg-name"><?php echo $_smarty_tpl->tpl_vars['message']->value['nickname'];?>
</h2>
                <h2 class="msg-time"><?php echo $_smarty_tpl->tpl_vars['message']->value['time'];?>
天前</h2>
            </div>
            <div class="msg-item-content">
                <p>
                    <?php echo $_smarty_tpl->tpl_vars['message']->value['description'];?>

                </p>
            </div>
            <?php
$_smarty_tpl->tpl_vars['message'] = $__foreach_message_0_saved_local_item;
}
if ($__foreach_message_0_saved_item) {
$_smarty_tpl->tpl_vars['message'] = $__foreach_message_0_saved_item;
}
?>
        </div>

	        <div class="nav-bottom">
	            <a class="bt-bottom"><h2>留言</h2></a>
	            <a class="bt-bottom" id="collect" href="Commodity_praise.php?id=<?php echo $_smarty_tpl->tpl_vars['skill']->value['id'];?>
"><h2>收藏</h2></a>
	            <a class="bt-bottom" href="I_want_accept.php"><h2>我要买</h2></a>
	        </div>
    </div>

</body>
</html><?php }
}
