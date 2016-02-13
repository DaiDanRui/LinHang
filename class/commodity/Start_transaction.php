<?php

/**
 * 
 ****************************************************************************************************
 * created by zend
 * @author darxan 
 * @date 2016年2月13日
 ****************************************************************************************************
 */
class Start_transaction
{
    private $commodity_id;
    private $commodity_type;
    private $commodity_holder_id;
    private $commodity_buyer_id;
    
    public function __construct($commodity_id,$commodity_type,$commodity_holder, $commodity_buyer)
    {
        $this->commodity_id = $commodity_id;
        $this->commodity_type = $commodity_type;
        $this->commodity_holder_id = $commodity_holder;
        $this->commodity_buyer_id = $commodity_buyer;
    }
    
    private function add_transaction_in_DB() {
        
    }
    
    private function send_msg() {
        
    }
    
    public function start_transaction() {
        $this->add_transaction_in_DB();
        $this->send_msg();
    }
}

?>