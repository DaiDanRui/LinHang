<?php
class DBupdater
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
     * @param ArrayObject $ary 关联数组所有键都必须是数据库中 字段名 也就是在Config_文件中存在
     */
    public function __construct($name,$ary){
        $this->commodity_array = $ary;
        $this->table_name = $name;
    }
    
    public function update() {
        
        
        
        $q = 'update '.$this->table_name.' set ';
        foreach ($this->commodity_array as $key => $value)
        {
            $q = $q."$key = '$value', ";
        }
        $field_value = substr($q, 0, strlen($q)-1);
        
        include_once('SQLexcute.php');
        $excute = new SQLexcute($q);
        $excute->excute();
    }
}

?>