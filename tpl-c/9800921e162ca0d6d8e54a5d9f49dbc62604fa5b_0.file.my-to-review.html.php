<?php
/* Smarty version 3.1.29, created on 2016-03-13 10:33:40
  from "/Applications/MAMP/htdocs/LinHang/tpl/My/my-to-review.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e533f436a436_80581381',
  'file_dependency' => 
  array (
    '9800921e162ca0d6d8e54a5d9f49dbc62604fa5b' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/My/my-to-review.html',
      1 => 1457861604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e533f436a436_80581381 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/main.js"><?php echo '</script'; ?>
>
    <title>我的-去评价</title>
</head>
<body>
<div class="wrapper">
    <div class="nav">
        <a class="sets">
            <img src="img/sets-back.png">
        </a>
        <h1 class="nav-title">评价</h1>
    </div>
    <div class="contents contents-3">
        <div class="buy-header">
            <div class="item-header item-header-buy">
                <img class="img-to-set" src="<?php echo $_smarty_tpl->tpl_vars['detail']->value['img'];?>
">
                <div class="titles">
                    <h1><?php echo $_smarty_tpl->tpl_vars['detail']->value['title'];?>
</h1>
                    <h3 class="sub-info"><?php echo $_smarty_tpl->tpl_vars['detail']->value['nickname'];?>
(<?php echo $_smarty_tpl->tpl_vars['detail']->value['time'];?>
天前)</h3>
                </div>
                <div class="price price-2"><?php echo $_smarty_tpl->tpl_vars['detail']->value['price'];?>
</div>
            </div>
            <div class="item-info">
                <img class="img-to-set-2" src="<?php echo $_smarty_tpl->tpl_vars['detail']->value['description_img'];?>
">
                <div class="info-detail">
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['detail']->value['description'];?>

                    </p>
                </div>
            </div>
        </div>

        <div class="content-wrapper wrapper-2">
            <div class="topic cont-bottom">
                <h1>语言表达</h1>
                <input class="publish-input-out publish-input-out-2" name="score1" id="time">
            </div>
            <div class="topic cont-bottom">
                <h1>耐心</h1>
                <input class="publish-input-out publish-input-out-2" name="score2" id="price">
            </div>
            <div class="topic cont-bottom">
                <h1>总体</h1>
                <input class="publish-input-out publish-input-out-2" name="score3" id="phone">
            </div>
        </div>

        <div class="confirm-bottom confirm-bottom-4">
            <form method="post" action="Evaluate.php?transaction_id=<?php echo $_smarty_tpl->tpl_vars['detail']->value['id'];?>
">
                <button name="confirm" type="submit">
                    确认
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html><?php }
}
