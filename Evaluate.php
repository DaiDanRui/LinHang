<?php
session_start();

if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/Injection.php';
    require_once 'class/Config_evaluation.php';
    require_once 'class/DBtraverser.php';
    require_once 'class/Config.php';
    
    $content = Injection::excute('content');  //评价内容
    $transaction_id = (int)$_GET['transaction_id']; //评价交易单
    $evaluater_id = $_SESSION['CURRENT_LOGIN_ID']; //评价人ID
    
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
    }
    else 
    {
        
    }
    
}
else
{
    include 'Login.php';
}
