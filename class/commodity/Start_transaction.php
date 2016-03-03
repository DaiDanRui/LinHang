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
    private $commodity_ary;
    private $commodity_acceptor_id;
    
    const  pay_id_length = 8;
    
    public function __construct($commodity_ary, $commodity_acceptor)
    {
        $this->commodity_ary = $commodity_ary;
        $this->commodity_acceptor_id = $commodity_acceptor;
    }
    
    private function add_transaction_in_DB() {
        $path = dirname(dirname(__FILE__));
        include_once($path.'/DBadder.php');
        include_once($path.'/Config_transaction.php');
        include_once($path.'/Config_commodity.php');
        include_once 'Transaction_state_config.php';
        include_once 'Commodity_type_Config.php';
        
        $buyer = -1;
        $holder = -1 ;
        if($this->commodity_ary[Config_commodity::type] == Commodity_type_Config::course)
        {
            $holder = $this->commodity_ary[Config_commodity::publisher];
            $buyer  = $this->commodity_acceptor_id;
        }else 
        {
            $buyer  = $this->commodity_ary[Config_commodity::publisher];
            $holder = $this->commodity_acceptor_id;
        }
        
        $myary = array(
            Config_transaction::choosed_id => $this->commodity_ary[Config_commodity::id],
            Config_transaction::state => Transaction_state_config::acceptor_comfirmed,
            
            Config_transaction::commodity_buyer_id => $buyer,
            Config_transaction::commodity_holder_id => $holder,
            
            Config_transaction::price => $this->commodity_ary[Config_commodity::price],
            
            Config_transaction::date_choose => date('Y-m-d H:i:s',time()),
            Config_transaction::date_confirm => date('Y-m-d H:i:s',0),
            Config_transaction::pay_id => $this->generate_pay_id(),
        
        );
        
        $adder = new DBadder(Config_transaction::table_name, $myary);
        $adder->excute_without_conn();
    }
    
    private function send_msg() {
        // wait to be done
    }
    
    public function start_transaction() {
        $this->add_transaction_in_DB();
        $this->send_msg();
    }
    
    public static function generate_pay_id()
    {
        return substr(md5(time()), 0, self::pay_id_length);
    }
}

?>