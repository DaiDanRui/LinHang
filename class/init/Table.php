<?php
/**
 * 
 * @author yan
 * @abstract 要求实现abstract方法
 * @see Table::get_field_name()
 */
abstract class Table
{
    protected $conn;
    protected $table_name;
    /**
     * @param unknown $c 必须是已经选择具体数据库的有效连接
     */
    public function __construct($c,$tbl){
        $this->conn = $c;
        $this->table_name = $tbl;
    }
    public function initTable(){
        $names = $this->get_field_name();
        $query = "create table $this->table_name ($names)";//sql语句
        if(!mysqli_query($this->conn, $query)){
            echo 'error to create table: ';
        }else {
            echo 'done:';
        }
        echo $this->table_name.'<br/>';
    }
    
    /**
     * 获得按序字段名
     * 获得按序字段类型
     * 以及相应约束
     * @return string 以‘，’隔开 
     */
    protected   abstract  function get_field_name();
}

?>