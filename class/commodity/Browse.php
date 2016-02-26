<?php
/**
 *****************************************************************************************************************************
 * created by zend  查看商品的详细信息  以及留言信息
 * @author darxan 
 * @version 2016年2月18日
 * @date    2016年2月18日
 */
class Browse
{
    private  $commodity_id;
    
    public function __construct($commodity_id)
    {
        $this->commodity_id = $commodity_id;
    }
    
    /**
     * 获取商品信息
     * @return   如果跟id对应的商品信息存在，返回关联数组；   否则返回false
     */
    public function commodity_info()
    {
        $path = dirname(dirname(__FILE__));
        include_once($path.'/DBtraverser.php');
        include_once($path.'/Config_commodity.php');
        
        
        $traverser = new DBtraverser(Config_commodity::table_name,
            Config_commodity::id. " = '$this->commodity_id' ");
        $result = $traverser->excute_without_conn();
        
        $commodity_info=mysqli_fetch_array($result,MYSQL_ASSOC);
        return $commodity_info==null? false : $commodity_info;
    }
    
    
}

?>