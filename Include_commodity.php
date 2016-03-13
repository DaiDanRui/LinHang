<?php
if(!isset($_SESSION))
{
    session_start();
}
function show_buy_html($commodity_id,$conn){
    require_once 'class/Config_commodity.php';
    require_once 'class/DBtraverser.php';

    $where = ' where '.Config_commodity::id.' = '."'".$commodity_id."'";
    $DBtraverser = new DBtraverser(Config_commodity::table_name,$where);
    $result = $DBtraverser->excute($conn);
    $array_commofity_info = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($array_commofity_info)
    {
        require_once 'Include_picture.php';
        require_once 'class/Info_user.php';
        require_once 'class/Config_user.php';
        $acceptor_info_array = Info_user::get_user_info_by_id($conn, $_SESSION['CURRENT_LOGIN_ID']);
        $publisher_info_array = Info_user::get_user_info_by_id($conn, $array_commofity_info[Config_commodity::publisher]);
        $commodity_array_for_display = array(
            'nickname' => $acceptor_info_array[Config_user::log_name],
            'acceptor_phone' => $acceptor_info_array[Config_user::phone_number],
            'publisher_name' => $publisher_info_array[Config_user::log_name],
            //  'publisher_phone' =>  $publisher_info_array[Config_user::phone_number],
            'publisher_phone' => $array_commofity_info[Config_commodity::communication_number],
            'title' => $array_commofity_info[Config_commodity::title],
            'time' => get_time($array_commofity_info[Config_commodity::release_date]),
            'price' => $array_commofity_info[Config_commodity::price],
            'description' => $array_commofity_info[Config_commodity::description],
            'description_img' => get_one_commodity_pic($conn, $array_commofity_info[Config_commodity::id]) ,
            'img' => 'upload/avatar.png',
            'id' => $commodity_id,
            //      'star_numbers' => $array_commofity_info[Config_commodity::praise],
            //      'message_numbers' => $array_commofity_info[Config_commodity::leave_message_time],
        );
        return $commodity_array_for_display;
    }
}

function get_time($release_date)
{
    $now_time = time();
    $release_time=strtotime($release_date);
    return (int)( ($now_time-$release_time) /3600/24);

}