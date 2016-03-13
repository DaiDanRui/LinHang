<?php
session_start();
define('SIZE_EACH_PAGE', 10);
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    include 'smarty_init.php';
    require_once 'class/Config_budget.php';
    require_once 'class/Config_transaction.php';
    require_once 'class/Info_user.php';
    require_once 'class/DBpagination.php';
    require_once 'class/Config.php';
    require_once 'class/Config_commodity.php';
    require_once 'class/DBcount.php';
    require_once 'class/Config_user.php';
    
    $conn = Config::connect();
    $id = $_SESSION['CURRENT_LOGIN_ID'];
    //choose from user table
    $income_and_pay = Info_user::get_user_account($conn, $id);
    $username_avatar = Info_user::get_user_avatar_and_logname($conn, $id);
    $income_and_outcome = array(
        'income'=>$income_and_pay[Config_user::income],
        'outcome' => $income_and_pay[Config_user::pay],
    //    'url_header' => $username_avatar[Config_user::pic_path],
        'url_header' =>'upload/avatar.png',
        'username' => $username_avatar[Config_user::log_name]
    );
    
    //choose from
    $tbl_name = Config_budget::table_name.','.Config_commodity::table_name;
    $choose_fields = array(
        Config_budget::table_name.'.'.Config_budget::pay_date,
        Config_commodity::table_name.'.'.Config_commodity::price,
        Config_commodity::table_name.'.'.Config_commodity::title,
    );
    $where = ' where '.Config_budget::table_name.'.'.Config_budget::commodity_id.' = '
             .Config_commodity::table_name.'.'.Config_commodity::id
    
        .' AND ('.Config_budget::table_name.'.'.Config_budget::holder_id.' = '."'$id'"
        .' OR '
            .Config_budget::table_name.'.'.Config_budget::payer_id.' = '."'$id'"
            . ')';
    
    //向数据库查询符合条件数，以计算显示分页数目
    $dbcount = new DBcount($tbl_name,$where);
    $retval = ($dbcount->excute($conn));
    $row = mysqli_fetch_array($retval,MYSQLI_NUM);
    $count = 1+ (int)(($row? $row[0]:0)/SIZE_EACH_PAGE);
    //3.计算当前页码；
    $page = isset($_GET['page'])?  (int)$_GET['page'] : 1;
    $page = $page>$count? $count : $page;
    
    $DBpagination = new DBpagination($tbl_name, $where, $page, SIZE_EACH_PAGE, $choose_fields);
    $retval = $DBpagination->excute($conn);
    $account_ary = array();
    while(($temp_account_ary=mysqli_fetch_array($retval, MYSQLI_ASSOC))!=null)
    {
        $account_ary[] = array(
            'time' => $temp_account_ary[Config_budget::pay_date],
            'type' => 0,
            'title' => $temp_account_ary[Config_commodity::title],
            'trader' => $temp_account_ary[Config_budget::commodity_id],
            'price_type' => $temp_account_ary[Config_commodity::publisher]==$id? 'income':'pay',
        );
    }
    
    $smarty->assign('account',$income_and_outcome);
    $smarty->assign('accounts',$account_ary);
    $smarty->display('My/my-account.html');
    
}
//如果没有登陆
else {
    include 'Login.php';
}