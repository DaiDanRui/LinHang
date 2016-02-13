<?php
/**
 ****************************************************************************************************
 * created by zend
 * @author darxan 
 ****************************************************************************************************
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