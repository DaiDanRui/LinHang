<?php
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @date    
 */
class MessageSender
{
    const uid = '106381';
    const psw = 'qwER19960808';
   
    
    public static function send($content,$mobile)
    {
        require_once 'sender_qixintong.php';
        //即时发送
        $res = sendSMS(self::uid,self::pwd,$mobile,$content);
        return  $res;
    }
    
    /* public static function send_by_user_id($content,$user_id)
    {
        require_once 'sender_qixintong.php';
        //即时发送
        $res = sendSMS(self::uid,self::pwd,$user_id,$content);
        return  $res;
    } */
}

?>