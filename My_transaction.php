<?php
defined('TRANSACTION_EACH_PAGE',10);

session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{

}
//如果没有登陆
else {
    include 'Login.php';
}

function found_transactions($conn)
{
    require_once 'class/DBpagination.php';
    require_once 'class/Config_transaction.php';
    require_once 'class/Config_commodity.php';
    $page = isset($_REQUEST['page'])? (int)$_REQUEST['page']:1;
    $is_payer = isset($_REQUEST['is_payer'])? (int)$_REQUEST['is_payer']:0;
    $where = 'where '.Config_transaction::table_name.".".Config_transaction::choosed_id 
              .' = ' .Config_commodity::table_name.".".Config_commodity::id;
    if($is_payer)
    {
        $where .= ' AND '.Config_transaction::table_name.".".Config_transaction::commodity_buyer_id 
                   .' = ' ."'".$_SESSION['CURRENT_LOGIN_ID']."'";
    }
    else 
    {
        $where .= ' AND '.Config_transaction::table_name.".".Config_transaction::commodity_holder_id.
                  ' = '."'".$_SESSION['CURRENT_LOGIN_ID']."'";
    }
    $choose_fields = array(
        
    );
    $DBpagination = new DBpagination(
        Config_transaction::table_name.",".Config_commodity::table_name,
        $where, $page, TRANSACTION_EACH_PAGE, $choose_fields);
    $retval = $DBpagination->excute($conn);
}