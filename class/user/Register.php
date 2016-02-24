<?php
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @date  
 * @deprecated  
 */
class Register
{
    private $ary;
    public function __construct($arry){
       $this->ary = $arry;
    }
    
    /**
     * 
     */
    public function register(){
        $path = dirname(dirname(__FILE__));
        include_once($path.'/DBadder.php');
        include_once($path.'/Config_user.php');
        include_once 'ResultReturn.php';
        $myDBadder = new DBadder(Config_user::table_name, $this->ary);
       if($myDBadder->excute_without_conn())
       {
           return ResultReturn::register_pass;
       }
       else
       {
           return ResultReturn::register_failed;
       }
    }
}

?>