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
    const uid = '';
    const psw = '';
    
    private $content;
    private $mobile;
    
    /**
     * 
     * @param unknown $content
     * @param unknown $mobile
     */
    public function __construct($content,$mobile)
    {
        $this->content = $content;
        $this->mobile  = $mobile;
    }
    
    public function send()
    {
        
    }
}

?>