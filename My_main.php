<?php
/**
 * 昵称
 * 卖家
 * 买家
 * 头像
 * 
 * 从此跳往六个界面
 * 我的账户： 具体的条目接单还是悬赏： 时间 类型 标题 对方人 收入支出数额
 * 我的评价详情: （默认收到别人的评价，  给别人的评价）
 *   收到别人的评价： 对方头像 对方的名字 悬赏标题 价格 评价详情（三个分数段） 时间
 *   收到别人的评价： 对方头像 对方的名字 悬赏标题 价格 评价详情（三个分数段） 时间
 *   语言表达 学习能力 认真度 总体
 * 
 * 我的收藏： 市场界面一样。 标题 描述  发布者头像 图片 价格 时间 赞  留言数 
 */
session_start();
//$_SESSION['CURRENT_LOGIN_ID'] = 1;
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    
    if(isset($_POST['next']))
    {
        
    }
    else {
        include 'smarty_init.php';
        require_once 'class/Info_user.php';
        require_once 'class/Config.php';
        require_once 'class/Config_user.php';
        $conn = Config::connect();
        $user_array = Info_user::get_user_info_by_id($conn, $_SESSION['CURRENT_LOGIN_ID']);
        $array_for_html = array(
            'url_header' => $user_array[Config_user::pic_path],
            'good_buyer' => $user_array[Config_user::payer_credit],
            'good_seller' => $user_array[Config_user::seller_credit],
            'username' => $user_array[Config_user::log_name],
            'url_header' => 'upload/avatar.png',
      //      'url_header' => $user_array[Config_user::pic_path],
       //     'url_header' => $user_array[Config_user::pic_path],
        );
        
        $smarty->assign('my_main',$array_for_html);
        $smarty->display('My/my-main.html');
        mysqli_close($conn);
    }
    
}
//如果没有登陆
else {
    include 'Login.php';
} 