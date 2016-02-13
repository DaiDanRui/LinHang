<?php

 /**
  ****************************************************************************************************
  * created by zend
  * @author darxan 
  * @date 2016年2月5日
  ****************************************************************************************************
  */
class Commodity_publish
{
    
   
    private  $ary;
    
    public function __construct($ary)
    {
        $this->ary = $ary;
    }
    /**
     * 不区分商品类别， 悬赏还是课程
     */
    public function excute()
    {
        $path = dirname(dirname(__FILE__));
        include_once($path.'/DBadder.php');
        include_once($path.'/Config_commodity.php');
        
        $myDBadder = new DBadder(Config_commodity::table_name, $this->ary);
        if($myDBadder->excuteWithoutConn())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
}
?>