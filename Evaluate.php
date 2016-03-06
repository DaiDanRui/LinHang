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
    require_once 'class/Injection.php';
    require_once 'class/Config_evaluation.php';
    require_once 'class/DBtraverser.php';
    require_once 'class/Config.php';
    require_once 'class/Config_transaction.php';
    
    $content = Injection::excute('content');  //评价内容
    $transaction_id = (int)$_REQUEST['transaction_id']; //评价交易单
    $evaluater_id = $_SESSION['CURRENT_LOGIN_ID']; //评价人ID
    $score1 = $_REQUEST['score1'];
    $score2 = $_REQUEST['score2'];
    $score3 = $_REQUEST['score3'];
    
    $conn = Config::connect();
    //判断订单是否已经存在
    $trasaction_DBtraveser = new DBtraverser(
        Config_transaction::table_name, 
        ' where '.Config_transaction::id.' = '."'".$transaction_id."'");
    $transaction_retval = $trasaction_DBtraveser->excute($conn);
    $transaction_array = mysqli_fetch_array($transaction_retval, MYSQL_ASSOC);
    
    if($transaction_array)
    {
            require_once 'class/Config_transaction.php';
            $evaluation_DBtraveser = new DBtraverser(
                Config_evaluation::tbl_name, 
                ' where '.Config_evaluation::transaction_id.' = '."'".$transaction_id."'".
                'AND'.Config_evaluation::is_payer.' = '."'".$evaluater_id."'"
            );
            if(!mysqli_fetch_array($evaluation_DBtraveser->excute($conn)))
            {
                $is_payer = $transaction_array[Config_transaction::commodity_buyer_id]==
                            $_SESSION['CURRENT_LOGIN_ID']?1:0;
                $score = 0;
                $ary = array(
                    Config_evaluation::evaluate_time => date('Y-m-d H:i:s',time()),
                    Config_evaluation::evaluation => $content,
                    Config_evaluation::is_payer => $is_payer,
                    Config_evaluation::score1 => $score1,
                    Config_evaluation::score2 => $score2,
                    Config_evaluation::score3 => $score3,
                    Config_evaluation::score => $score,
                    Config_evaluation::transaction_id => $transaction_id
                );
                $DBadder = new DBadder(Config_evaluation::tbl_name, $ary);
                $DBadder->excute($conn);
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
else
{
    include 'Login.php';
}
