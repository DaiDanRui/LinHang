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
        
        $is_first_value = true;
        foreach ($this->commodity_array as $key => $value)
        {
            if(!$is_first_value)
            {
                $q = $q.',';
            }else 
            {
                $is_first_value = false;
            }
            $q = $q." $key = '$value' ";
        }
        
        include_once('SQLexcute.php');
        $excute = new SQLexcute($q);
        return $excute->excute();
    }
}

?>