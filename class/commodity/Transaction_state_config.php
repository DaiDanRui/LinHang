<?php

/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月13日
 * @date    2016年2月13日
 */
class Transaction_state_config
{
    
    public static function  can_be_choose($state)
    {
        return $state<2;
    }
    /**
     * 开始状态
     */
    const just_publish = 0;
    /**一方接单，向另一方请求
     */
    const acceptor_comfirmed = 1;
    /**双方确认，开始授课
     * 此时课程不可以被其他人选择
     * @var unknown
     */
    const both_comfirmed = 2;
    /**授课完成
     */
    const complete_service = 3;
    /**支付完成,订单半完成
     */
    const payed = 16;
     
    /**单方请求被拒绝，订单结束
     */
    const refused = 17;
    /**授课者评价完成,订单半完成
     */
    const commodity_holder_praised = 18;
    /**购课者评价完成,订单半完成
     */
    const commodity_buyer_praised = 19;
    /**双方评价完成,订单正常结束
     */
    const end = 20;
    /**用户要求平台介入
     */
    const custom_ask_platform_intervention = 24;
    /**发生争执，平台介入处理
     */
    const platform_intervention = 25;
    /**平台处理结束
     */
    const platform_intervention_end = 26;
    /**
     * 没有开始交易，商品被用户选择删除
     * @var unknown
     */
    const commodity_deleted = 27;
}

?>