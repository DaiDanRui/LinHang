<?php
/**
 ****************************************************************************************************
 * created by zend
 * @author darxan 
 ****************************************************************************************************
 */
class Config_user
{
    const table_name = 'tbl_user';
    public $user_array =  Array(
        'id',
        'is_seller',
        'log_name',
        
        'password',
        'legal_name',
        'school',
        'school_id',
        
        'phone_number',
        'email',
        'nick_name',
        'birthday',
        
        'is_active',
        'create_time',
        'last_log',
        'sex',
        'seller_credit',
        'payer_credit',
        
        'pic_path',
        'income',
        'pay',
        'strongpoint',
        'interest',
        
        'count_publish_course',
        'count_publish_reward',
        'count_choose_course',
        'count_choose_reward',
        );
    
    
    const id = 'id';
    const is_seller = 'is_seller';
    const log_name = 'log_name';
    
    const password = 'password';
    const legal_name = 'legal_name';
    const school = 'school';
    const school_id = 'school_id';
    
    const phone_number = 'phone_number';
    const email = 'email';
    const nick_name = 'nick_name';
    const birthday = 'birthday';
    
    const is_active = 'is_active';
    const create_time = 'create_time';
    const last_log = 'last_log';
    const sex = 'sex';
    const seller_credit = 'seller_credit';
    const payer_credit = 'payer_credit';
    
    const pic_path = 'pic_path';
    const income = 'income';
    const pay = 'pay';
    const strongpoint = 'strongpoint';
    const interest = 'interest';
    
    const count_publish_course = 'count_publish_course';
    const count_publish_reward = 'count_publish_reward';
    const count_choose_course = 'count_choose_course';
    const count_choose_reward = 'count_choose_reward';
    
}

?>