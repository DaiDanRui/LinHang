<?php
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/Injection.php';
    require_once 'Included_update_state.php';
    require_once 'class/commodity/Transaction_state_config.php';
    
    $conn = Config::connect();
    $retval = update_commodity_state_and_return_commodity(
        $conn,
        Injection::excute('commodity_id'),
        Transaction_state_config::both_comfirmed
    );
    $commodity_ary = mysqli_fetch_array($retval, MYSQL_ASSOC);
    if($commodity_ary && update_transaction_state($conn, $commodity_ary))
    {
    if($commodity_ary[Config_commodity::type] == Commodity_type_Config::course)
        {
            $content = '尊敬的用户您好，您选中的课程 '.$commodity_ary[Config_commodity::title].
                       '客户 '.$_SESSION['CURRENT_LOGIN_USER'].' 已确认。请前往领行客户中心查看详情并于客户联系，开始接受授课';
        }
        else 
        {
            $content = '尊敬的用户您好，您接单的悬赏 '.$commodity_ary[Config_commodity::title].
                       '客户 '.$_SESSION['CURRENT_LOGIN_USER'].' 已确认。请前往领行客户中心查看详情并于客户联系';
        }
        require_once 'class/MessageSender.php';
        MessageSender::send($content, $mobile);
    }
    else 
    {
        
    }
    mysqli_free_result($retval);
    mysqli_close($conn);
}
else
{
    require  'Login.php';
}



function update_transaction_state($conn,$commodity_ary)
{

    include_once('class/DBupdater.php');
    include_once('class/Config_transaction.php');
    include_once('class/Config_commodity.php');
    include_once 'class/commodity/Transaction_state_config.php';

    
    $ary = array(
        Config_transaction::state => Transaction_state_config::both_comfirmed
    );
    $where = ' where '.Config_transaction::choosed_id.' = '.
             "'".$commodity_ary[Config_commodity::id]."'";
    $DBupdater = new DBupdater(Config_commodity::table_name, $ary, $where);
    return $DBupdater->excute($conn);
}
