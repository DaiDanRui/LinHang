<?php
class DBfinder
{
    private $table_name;
    private $ary;
    /**
     * @param unknown $name
     * @param ArrayObject $ary关联数组所有键都必须是数据库中 字段名 也就是在Config_文件中存在
     */
    public function __construct($name,$ary){
        $this->commodity_array = $ary;
        $this->table_name = $name;
    }
    
    public function find()
    {
        $q = 'select * from '.$this->table_name."where '1'='1'";
        
        $is_first_value = true;
        foreach ($this->ary as $key => $value) {
            if(!$is_first_value)
            {
                $q = $q.'AND';
            }
            else 
            {
                $is_first_value = false;
            }
            $q = $q." $key = $value ";
        }
         
        include_once('SQLexcute.php');
        $excute = new SQLexcute($q);
        return $excute->excute();
    }
}

?>