<?php
/**
 ****************************************************************************************************
 * created by zend
 * @author darxan 
 ****************************************************************************************************
 */
class Config_transaction
{
    public  $transaction_course = array(
        'id',
        'choosed_id',
        'state',
        'payer_id',
        'seller_id',
        'price',
        'date_choose',
        'date_pay',
        'payer_account_type',
        'payer_account',
        'seller_account_type',
        'seller_account',
        'is_payer_evaluated',
        'payer_evaluation',
        'is_seller_evaluated',
        'seller_evaluation',
        'pay_id',
    );
    const id = 'id'      ;
    const choosed_id = 'choosed_id'     ;
    const state = 'state' ;
    const payer_id = 'payer_id'  ;
    const seller_id =  'seller_id'  ;
    const price = 'price'  ;
    const date_choose = 'date_choose'  	;
    const date_pay = 'date_pay'  	;
    const payer_account_type = 'payer_account_type'  	;
    const payer_account = 'payer_account'  	;
    const seller_account_type =  'seller_account_type' ;
    const seller_account = 'seller_account';
    const is_payer_evaluated = 'is_payer_evaluated'  	;
    const payer_evaluation = 'payer_evaluation'  	;
    const is_seller_evaluated =  'is_seller_evaluated' ;
    const seller_evaluation = 'seller_evaluation';
    
}

?>