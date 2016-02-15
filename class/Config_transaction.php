<?php
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @date    
 */
class Config_transaction
{
    public  $transaction_course = array(
        'id',
        'choosed_id',
        'state',
        'commodity_holder_id',
        'commodity_buyer_id',
        
        'price',
        'date_choose',
        'date_confirm',
        
       
        'pay_id'
    );
    
    const table_name = 'tbl_transaction';
    
    const id = 'id'      ;
    const choosed_id = 'choosed_id'     ;
    const state = 'state' ;
    /** 对于课程： 指代授课者，收钱
     *  对于悬赏： 指代接单人，收钱
     */
    const commodity_holder_id = 'commodity_holder_id'  ;
    /**对于课程：指代买课者，付钱
     * 对于悬赏：指代悬赏发布者，付钱
     */
    const commodity_buyer_id =  'commodity_buyer_id'  ;
    
    const price = 'price'  ;
    const date_choose = 'date_choose'  	;
    const date_confirm = 'date_confirm'  	;
    
    const pay_id = 'pay_id';
}

?>