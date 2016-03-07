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
    private $limit_querl_part;
    
    private $page;
    private $page_size;
    private $choose_fields;
    /**
     * <strong>必须释放结果集</strong> 搜索的结果是{$size}数量级的
     * @param string $tb_name
     * @param string $where 限制性语句，'where a = 1'...
     * @param int $page
     * @param int $size
     * @param array $choose_fields 
     */
    public function __construct($tb_name,$where, $page, $size, $choose_fields)
    {
        $this->table_name = $tb_name;
        $this->limit_querl_part = $where;
        $this->page = $page;
        $this->page_size = $size;
        $this->choose_fields = $choose_fields;
    }
    
    
    
    /**
     * $page >= 1   $page_size>0
     * @see DBexcutor::getSQL()
     */
    protected function getSQL()
    {
        if(empty($this->choose_fields))
        {
            $fields = '*';
        }
        else 
        {
            $fields = join(',', array_values($this->choose_fields));
        }
        $page_start = ($this->page-1)*$this->page_size;
        
        $q = 'select '.$fields.' from '.$this->table_name. 
             $this->limit_querl_part.
             '  LIMIT '.$page_start.','.$this->page_size;
        return $q;
    }
}

?>