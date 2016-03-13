<?php
/**
 * url_header
 * title
 * price
 * username
 *
 * point_study
 * point_care
 * point_total
 * time
 */
session_start();
define('EVALUATION_PAGE_SIZE', 10);
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    include 'smarty_init.php';
    require_once 'class/Config_evaluation.php';
    require_once 'class/DBpagination.php';
    require_once 'class/Config_user.php';
    require_once 'class/Config_transaction.php';
    require_once 'class/Config.php';
    require_once 'class/Config_commodity.php';
//    require_once 'Include_picture.php';
    $conn = Config::connect();
    $page = isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
    $user_id = $_SESSION['CURRENT_LOGIN_ID'];
    $table_name = Config_evaluation::tbl_name.','.Config_user::table_name.",".Config_commodity::table_name;
    $choose_fields =array(
        Config_user::table_name.".".Config_user::pic_path,
        Config_user::table_name.".".Config_user::log_name,
        Config_evaluation::tbl_name.".".Config_evaluation::evaluate_time,
        Config_evaluation::tbl_name.".".Config_evaluation::score1,
        Config_evaluation::tbl_name.".".Config_evaluation::score2,
        Config_evaluation::tbl_name.".".Config_evaluation::score3,
        Config_evaluation::tbl_name.".".Config_evaluation::score,
        Config_commodity::table_name.".".Config_commodity::title,
        Config_commodity::table_name.'.'.Config_commodity::price
    
    );
    
   
    if(isset($_REQUEST['evaluation'])) //如果是查找自己评价别人的
    {   
        $where = search_evaluation();
    }else { //如果是查找别人评价自己的
        $where = search_evaluated();
    }
    $DBpagination = new DBpagination
    ($table_name, $where, $page, EVALUATION_PAGE_SIZE, $choose_fields);
    $retval = $DBpagination->excute($conn);
    $array_for_html = array();
    while(($row=mysqli_fetch_array($retval, MYSQLI_ASSOC))!=NULL)
     {
            $array_for_html[] = array(
            //    'url_header' => $row[Config_user::pic_path],
                'url_header' => 'upload/avatar.png',
                'title' => $row[Config_commodity::title],
                'price' => $row[Config_commodity::price],
                'username' => $row[Config_user::log_name],
                'point_study' => $row[Config_evaluation::score1],
                'point_care' => $row[Config_evaluation::score2],
                'point_total' => $row[Config_evaluation::score],
                'time' => $row[Config_evaluation::evaluate_time],
                //get_commodity_pic($conn,$row[Config_commodity::id)
            );
     }
    //display
    $smarty->assign('reviews',$array_for_html);
    $smarty->display('My/my-review.html');
    mysqli_free_result($retval);
    mysqli_close($conn);
}else {
    include 'Login.php';
}

function search_evaluated()
{
    global  $user_id;
    $where = ' where '.Config_evaluation::tbl_name.".".Config_evaluation::valuated
                  .' = '."'$user_id'"
                  .' AND '.Config_evaluation::tbl_name.".".Config_evaluation::valuated
                  .' = '.Config_user::table_name.".".Config_user::id
                  .' AND '.Config_commodity::table_name.".".Config_commodity::id
                  .' = '.Config_evaluation::commodity_id;
    return $where;
}

function search_evaluation()
{
    global  $user_id;
    $where = ' where '.Config_evaluation::tbl_name.".".Config_evaluation::valuator
                  .' = '."'$user_id'"
                  .' AND '.Config_evaluation::tbl_name.".".Config_evaluation::valuated
                  .' = '.Config_user::table_name.".".Config_user::id
                  .' AND '.Config_commodity::table_name.".".Config_commodity::id
                  .' = '.Config_evaluation::commodity_id;
    return $where;
}