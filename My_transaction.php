<?php
define('TRANSACTION_EACH_PAGE',10);

session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    require_once 'class/Config.php';
    require_once 'class/DBpagination.php';
    require_once 'class/Config_transaction.php';
    require_once 'class/Config_commodity.php';
    require_once 'Include_picture.php';
    require_once 'class/Info_user.php';
    include 'smarty_init.php';
    $user_id = $_SESSION['CURRENT_LOGIN_ID'];
    $conn = Config::connect();
    $retval = found_transactions($conn);
    //逐个配置 array 三级关联数组  供界面使用
    $array = array();
    while (($temp_database_row_array = mysqli_fetch_array($retval, MYSQLI_ASSOC))!=null) {
        $buyer_id = $temp_database_row_array[Config_transaction::commodity_buyer_id];
        $holder_id = $temp_database_row_array[Config_transaction::commodity_holder_id];
        $trader = $buyer_id==$user_id?$holder_id:$buyer_id; 
        $trader_avatar_and_logname = Info_user::get_user_avatar_and_logname($conn, $trader);
        $array[] = array(
//             'url_header' => $trader_avatar_and_logname[Config_user::pic_path],
            'url_header' => 'upload/avatar.png',
            'url_pic' => get_one_commodity_pic($conn, $temp_database_row_array[Config_commodity::id]),
            'acceptor' => $trader_avatar_and_logname[Config_user::log_name],
            'title'=> $temp_database_row_array[Config_commodity::title],
            'price' => $temp_database_row_array[Config_commodity::price],
            'id' => $temp_database_row_array[Config_commodity::id],
            
        );
    }
    $smarty->assign('accepts',$array);
    $smarty->display('My/my-accepted.html');
}
//如果没有登陆
else {
    include 'Login.php';
}

function found_transactions($conn)
{
    
    $page = isset($_REQUEST['page'])? (int)$_REQUEST['page']:1;
    
    $where = ' where '.Config_transaction::table_name.".".Config_transaction::choosed_id 
              .' = ' .Config_commodity::table_name.".".Config_commodity::id;
   
    if(isset($_GET['type']))
    {
        if($_GET['type']=='skill')
        {
            $where .= ' AND '.Config_transaction::table_name.".".Config_transaction::commodity_holder_id.
                ' = '."'".$_SESSION['CURRENT_LOGIN_ID']."'";
        }else 
        {
            $where .= ' AND '.Config_transaction::table_name.".".Config_transaction::commodity_buyer_id
            .' = ' ."'".$_SESSION['CURRENT_LOGIN_ID']."'";
        }
    }else{
        $where .= ' AND ('.Config_transaction::table_name.".".Config_transaction::commodity_buyer_id
        .' = ' ."'".$_SESSION['CURRENT_LOGIN_ID']."'"
            .' OR '.Config_transaction::table_name.".".Config_transaction::commodity_holder_id.
            ' = '."'".$_SESSION['CURRENT_LOGIN_ID']."'"
                .')';
    }
    
    
    $table_name = Config_transaction::table_name.",".Config_commodity::table_name;
    $choose_fields = array(
        Config_transaction::table_name.".".Config_transaction::commodity_buyer_id,
        Config_transaction::table_name.".".Config_transaction::commodity_holder_id,
        Config_commodity::table_name.".".Config_commodity::title,
        Config_commodity::table_name.".".Config_commodity::price,
        Config_commodity::table_name.".".Config_commodity::id,
    );
    $DBpagination = new DBpagination(
        $table_name,
        $where, $page, TRANSACTION_EACH_PAGE, $choose_fields);
    $retval = $DBpagination->excute($conn);
    return $retval;
}