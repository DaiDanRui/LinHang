<?php
/* Smarty version 3.1.29, created on 2016-03-13 08:20:41
  from "/Applications/MAMP/htdocs/LinHang/tpl/Reward&Market/market-skill-buy.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e514c9e63c44_53843281',
  'file_dependency' => 
  array (
    'b8b44cdc7692ab4c989c7588245f996dcb23406e' => 
    array (
      0 => '/Applications/MAMP/htdocs/LinHang/tpl/Reward&Market/market-skill-buy.html',
      1 => 1457853640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e514c9e63c44_53843281 ($_smarty_tpl) {
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
    <title>市场-技能详情-我要买</title>
</head>
<body>
<div class="wrapper">
    <div class="nav">
        <a class="sets">
            <img src="img/sets-back.png">
        </a>
        <h1 class="nav-title">我要接单</h1>
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
        <div class="buy-header buy-content">
            <table>
                <tr>
                    <td><h1>悬赏</h1></td>
                    <td><h1><?php echo $_smarty_tpl->tpl_vars['detail']->value['title'];?>
</h1></td>
                </tr>
                <tr>
                    <td><h1>总金额</h1></td>
                    <td><h1><?php echo $_smarty_tpl->tpl_vars['detail']->value['price'];?>
</h1></td>
                </tr>
                <tr>
                    <td><h1>接单人</h1></td>
                    <td><h1><?php echo $_smarty_tpl->tpl_vars['detail']->value['nickname'];?>
</h1></td>
                </tr>
                <tr>
                    <td><h1>联系方式</h1></td>
                    <td><h1><?php echo $_smarty_tpl->tpl_vars['detail']->value['acceptor_phone'];?>
</h1></td>
                </tr>
                <tr>
                    <td><h1>悬赏发起</h1></td>
                    <td><h1><?php echo $_smarty_tpl->tpl_vars['detail']->value['publisher_name'];?>
</h1></td>
                </tr>
                <tr>
                    <td><h1>联系方式</h1></td>
                    <td><h1><?php echo $_smarty_tpl->tpl_vars['detail']->value['publisher_phone'];?>
</h1></td>
                </tr>
            </table>
        </div>
        <div class="confirm-bottom">
            <form method="post" action="I_want_accept.php">
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
