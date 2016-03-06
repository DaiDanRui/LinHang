<?php
/**
 *****************************************************************************************************************************
 * created by zend
 * 
 * @author darxan 
 * @version 2016年2月26日
 * @date    2016年2月26日
 */
include_once 'DBexcutor.php';
class DBcount extends DBexcutor
{
    private $table_name;
    private $where;
    /**
     * 统计行数目并返回
     * <br/>不需要对结果释放
     * @param string $name 
     * @param string $where
     */
    public function __construct($name,$where){
        $this->where = $where;
        $this->table_name = $name;
    }
    
    
    /**
     * @return string sql 语句
     */
    protected function getSQL()
    {
        return  'select count(*) from '.$this->table_name.'  '.$this->where;
    }
    
    
}

?>