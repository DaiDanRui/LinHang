<?php
include_once 'DBexcutor.php';
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @date    
 */
class DBtraverser extends DBexcutor
{
    private $table_name;
    private $where;
    
    public function __construct($name,$where){
        $this->where = $where;
        $this->table_name = $name;
    }
    /* public function excute_without_conn(){
        
        include_once('SQLexcute.php');
        $excute = new SQLexcute($this->getSQL());
        return $excute->excute();
    } */
    
    /**
     * @return string sql 语句
     */
    protected function getSQL()
    {
        return  'select * from'.$this->table_name.' where '.$this->where;
    }
}

?>