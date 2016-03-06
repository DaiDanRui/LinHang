<?php
include_once 'DBexcutor.php';
/**
 ****************************************************************************************************
 * created by zend
 * @author darxan 
 ****************************************************************************************************
 */
class DBadder extends DBexcutor
{
    /**
     * without pre
     * @var unknown
     */
    private $table_name;
    /**
     * 
     * @var ArrayObject
     */
    private $commodity_array;
    
    /**
     * @param unknown $name
     * @param ArrayObject $ary关联数组所有键都必须是数据库中 字段名 也就是在Config_文件中存在
     */
    public function __construct($name,$ary){
        $this->commodity_array = $ary;
        $this->table_name = $name;
    }
    /**
     * 后置： 对应商品插入数据库中
     * 前置： 该类已正确初始化
     */
   /*  public function excute_without_conn( ) 
    {

        
        include_once('SQLexcute.php');
        $excute = new SQLexcute($this->getSQL());
        return $excute->excute();
    } */
    
    /**
     * @return string sql 语句
     */
    protected function getSQL()
    {
        /* $q = 'insert into '. $this->table_name;
        $field_name = '';
        $field_value = '';
        
        $is_first_value = true;
        foreach($this->commodity_array as $key => $value)
        {
            if(!$is_first_value)
            {
                $field_name = $field_name.' , ';
                $field_value = $field_value.' , ';
            }
            else
            {
                $is_first_value = false;
            }
            $field_name  = $field_name .$key      ;
            $field_value = $field_value." '$value' "    ;
        }
        //      $field_value = substr($field_value, 0, strlen($field_value)-1);
        $q = $q. '(' . $field_name. ')'
            .'values'.
            '(' . $field_value . ')';
        
        return $q; */
        $key_string = join(',', array_keys($this->commodity_array));
        $value_string = "'".join("','", array_values($this->commodity_array))."'";
        $sql = 'insert  into '.$this->table_name. 
        ' ('.$key_string. ')'.' values '. '(' . $value_string . ')';
        return $sql;
    }
    
    
}

?>