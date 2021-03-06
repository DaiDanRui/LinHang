<?php
/**
 * 第一张图片
 * 价格
 * 发布人 
 * 
 * 悬赏人 接单人基本信息： 联系方式  昵称
 * 
 */
session_start();

if(isset($_SESSION['CURRENT_LOGIN_ID']) && isset($_SESSION['CURRENT_LOGIN_USER']))
{
    require_once 'class/Config.php';
    require_once 'class/Info_commodity.php';
    require_once 'class/commodity/Transaction_state_config.php';
    
    $commodity_id = (int)$_GET['commodity_id'];
    //连接数据库
    $conn = Config::connect();
    
    
    $commodity = new Info_commodity($conn, $commodity_id);
    $commodity_ary = $commodity->get_commodity();
    //判断当前用户是否具有权限: 当当前用户不是发布者
    if($commodity_ary[Config_commodity::publisher]!=$_SESSION['CURRENT_LOGIN_ID'])
    {
        //更新商品状态
        $commodity->update(Transaction_state_config::acceptor_comfirmed);
        //创建订单
        if(create_transaction($conn, $commodity_ary))
        {
            send_msg($commodity_ary);
            include_once ('smarty_init.php');
            $smarty->display("");
        }
        else 
        {
        }
    }
    else 
    {
    }
    
}
else
{
    include  'Login.php';
}

function send_msg($commodity_ary)
{
        if($commodity_ary[Config_commodity::course_or_reward] == Commodity_type_Config::course)
        {
            $content = '尊敬的用户您好，您发布的课程 '.$commodity_ary[Config_commodity::title].
            '已被客户 '.$_SESSION['CURRENT_LOGIN_USER'].'选中。请前往领行客户中心查看详情并于客户联系';
        }
        else
        {
            $content = '尊敬的用户您好，您发布的悬赏 '.$commodity_ary[Config_commodity::title].
            '已被客户 '.$_SESSION['CURRENT_LOGIN_USER'].'选中。请前往领行客户中心查看详情并于客户联系';
        }
        require_once 'class/MessageSender.php';
        MessageSender::send_by_acceptor_id($content, $commodity_ary[Config_commodity::publisher]);
    
}

function create_transaction($conn,$commodity_ary)
{
    
    include_once('class/DBadder.php');
    include_once('class/Config_transaction.php');
    include_once('class/Config_commodity.php');
    include_once 'class/commodity/Transaction_state_config.php';
    include_once 'class/commodity/Commodity_type_Config.php';
    
    $buyer = -1;
    $holder = -1;
    $commodity_acceptor_id = Injection::excute('commodity_acceptor_id');
    if($commodity_ary[Config_commodity::course_or_reward] == Commodity_type_Config::course)
    {
        $holder = $commodity_ary[Config_commodity::publisher];
        $buyer  = $commodity_acceptor_id;
    }else
    {
        $buyer  = $commodity_ary[Config_commodity::publisher];
        $holder = $commodity_acceptor_id;
    }
    
    $myary = array(
        Config_transaction::choosed_id => $commodity_ary[Config_commodity::id],
        Config_transaction::state => Transaction_state_config::acceptor_comfirmed,
    
        Config_transaction::commodity_buyer_id => $buyer,
        Config_transaction::commodity_holder_id => $holder,
    
        Config_transaction::price => $this->commodity_ary[Config_commodity::price],
    
        Config_transaction::date_choose => date('Y-m-d H:i:s',time()),
        Config_transaction::date_confirm => date('Y-m-d H:i:s',0),
        Config_transaction::pay_id => substr(md5(time()), 0, 8),  //8是支付码长度
        Config_transaction::course_or_reward => $commodity_ary[Config_commodity::course_or_reward]
    
    );
    
    $adder = new DBadder(Config_transaction::table_name, $myary);
    return$adder->excute($conn);
}

