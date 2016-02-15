<?php
include_once 'DBexcutor.php';
/**
 *****************************************************************************************************************************
 * created by zend
 * 数据库分页封装
 * @author darxan 
 * @version 2016年2月15日
 * @date    2016年2月15日
 */
class DBpagination extends  DBexcutor
{
    private $table_name;
    private $where;
    
    private $page;
    private $page_size;
    
    public function __construct($tb_name, $where, $page, $size)
    {
        $this->table_name = $tb_name;
        $this->where = $where;
        $this->page = $page;
        $this->page_size = $size;
    }
    
    /**
     * $page >= 1   $page_size>0
     * @see DBexcutor::getSQL()
     */
    protected function getSQL()
    {
        $page_start = ($this->page-1)*$this->page_size;
        $q = 'select * from '.$this->table_name.
             ' where '.$this->where.
             ' DESC LIMIT '.$page_start.','.$this->page_size;
        return $q;
    }
}

?>