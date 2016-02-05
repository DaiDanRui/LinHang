<?php
class Commodity
{
    
   
    private  $ary;
    
    function __construct($ary)
    {
        $this->ary = $ary;
    }
    
    function addCommodity()
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