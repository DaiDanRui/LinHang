<?php
require_once('Table.php');
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @see Table
 */
class Table_transaction extends Table
{
    public function __construct($conn){
    
        parent::__construct($conn, 'tbl_transaction');
    }
    protected function get_field_name(){
        return '
            id                  BIGINT         not null   AUTO_INCREMENT,
            choosed_id          BIGINT         not null,
            state               tinyint         not null,
            commodity_holder_id BIGINT         not null,
            commodity_buyer_id  BIGINT         not null,
            
            price               FLOAT(7,3)         not null,
            date_choose         DATETIME         not null,
            date_confirm        DATETIME                 ,
            
            pay_id              VARCHAR(20)   CHARACTER SET utf8 COLLATE utf8_general_ci  not null,
    
            course_or_reward    tinyint not null	,
            
            PRIMARY KEY (id),
            INDEX index_commodity_holder_id(commodity_holder_id),
            INDEX index_commodity_buyer_id(commodity_buyer_id),
            INDEX index_date_choose(date_choose)
            
        ';
    }
}

?>