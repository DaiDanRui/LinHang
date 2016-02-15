<?php
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @date    2016年2月15日
 */
class Config_picture_path
{
    /**
     * 
     * @var array
     */
    public $config_path ;
    
    public function __construct()
    {
        $this->config_path = array(
            dirname(dirname(__FILE__)).'\upload'
        );
    }

}

?>