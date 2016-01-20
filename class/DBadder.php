<?php
class DBadder
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
    public function add( ) 
    {
        
        $q = 'insert into'. $this->table_name;
        $field_name = '';
        $field_value = '';
        
        $is_first_value = true;
        foreach($this->commodity_array as $key => $value)
         {
             if(!$is_first_value)
             {
                 $q = $q.' , ';
             }
             else
             {
                 $is_first_value = false;
             }
             $field_name  = $field_name .$key      ;
             $field_value = $field_value.$value    ;
         }
//       $field_value = substr($field_value, 0, strlen($field_value)-1);
        $q = $q.'('.$field_name.')'.'values'.'('.$field_value.')';
        
        
        include_once('SQLexcute.php');
        $excute = new SQLexcute($q);
        return $excute->excute();
    }
}

?>