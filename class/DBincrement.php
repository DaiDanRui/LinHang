<?php
include_once 'DBexcutor.php';
/**
 *****************************************************************************************************************************
 * created by zend
 * 数据库表字段自加封装
 * @author darxan 
 * @version 2016年2月15日
 * @date    2016年2月15日
 */
class DBincrement extends DBexcutor
{
    
    private $table_name;
    private $field_name;
    private $where;
    
    
    public function __construct($tb_name,$field_name,$where){
        $this->table_name = $tb_name;
        $this->field_name = $field_name;
        $this->where = $where;
    }
    
    
    /**
     * @return string sql 语句
     */
    protected function getSQL()
    {
        $q = 'update '.$this->table_name.
             ' set '.$this->field_name.' = '.$this->field_name.' + 1 '.
              $this->where;
        return $q;
    }
}

?>