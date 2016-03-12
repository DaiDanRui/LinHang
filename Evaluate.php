<?php
session_start();
/**
 * content
 * transaction_id
 * score1
 * score2
 * score3 
 */
$_SESSION['CURRENT_LOGIN_ID'] = 1;
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    evaluate();
}
else
{
    include 'Login.php';
}
function evaluate()
{
    require_once 'class/Injection.php';
    require_once 'class/Config_evaluation.php';
    require_once 'class/DBtraverser.php';
    require_once 'class/Config.php';
    require_once 'class/Config_transaction.php';
    include 'smarty_init.php';
    
    $content = Injection::excute('content');  //评价内容
    $transaction_id = (int)$_REQUEST['transaction_id']; //评价交易单
    $evaluater_id = $_SESSION['CURRENT_LOGIN_ID']; //评价人ID
    $score1 = $_REQUEST['score1'];
    $score2 = $_REQUEST['score2'];
    $score3 = $_REQUEST['score3'];
    $score  = 10;
    $conn = Config::connect();
    
    //判断订单是否已经存在
    $trasaction_DBtraveser = new DBtraverser(
        Config_transaction::table_name,
        ' where '.Config_transaction::id.' = '."'".$transaction_id."'");
    $transaction_retval = $trasaction_DBtraveser->excute($conn);
    $transaction_array = mysqli_fetch_array($transaction_retval, MYSQLI_ASSOC);
    
    if($transaction_array)
    {
        $is_payer = $transaction_array[Config_transaction::commodity_buyer_id]==$evaluater_id? 1 : 0;;
        require_once 'class/Config_transaction.php';
        
        $evaluation_DBtraveser = new DBtraverser(
            Config_evaluation::tbl_name,
            ' where '.Config_evaluation::commodity_id.' = '."'".$transaction_array[Config_transaction::choosed_id]."'".
            'AND'.Config_evaluation::is_payer.' = '."'".$is_payer."'"
        );
        if(!mysqli_fetch_array($evaluation_DBtraveser->excute($conn)))
        {
            $evaluated = $transaction_array[Config_transaction::commodity_buyer_id]==$evaluater_id?
                         $transaction_array[Config_transaction::commodity_holder_id]:
                         $transaction_array[Config_transaction::commodity_buyer_id];
            $ary = array(
                Config_evaluation::evaluate_time => date('Y-m-d H:i:s',time()),
                Config_evaluation::evaluation => $content,
                Config_evaluation::is_payer => $is_payer,
                Config_evaluation::score1 => $score1,
                Config_evaluation::score2 => $score2,
                Config_evaluation::score3 => $score3,
                Config_evaluation::score => $score,
                Config_evaluation::commodity_id => $transaction_array[Config_transaction::choosed_id],
                Config_evaluation::valuator =>  $evaluater_id,
                Config_evaluation::valuated => $evaluated
            );
            $DBadder = new DBadder(Config_evaluation::tbl_name, $ary);
            $DBadder->excute($conn);
            
             $smarty->display("");
        }
        else {
        }
    }
    else
    {
    }
    mysqli_free_result($transaction_retval);
    mysqli_close($conn);
}