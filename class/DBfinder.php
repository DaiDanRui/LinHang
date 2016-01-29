<?php
class DBfinder
{
    private $table_name;
    private $ary;
    /**
     * @param unknown $name 数据库表名
     * @param ArrayObject $ary关联数组所有键都必须是数据库中 字段名 也就是在Config_文件中存在
     */
    public function __construct($name,$ary){
        $this->commodity_array = $ary;
        $this->table_name = $name;
    }
    /**
     * 没有进行 mysqli_fetch_array($retval, MYSQL_ASSOC)
     */
    public function find()
    {
        $q = 'select * from '.$this->table_name.' where ';
        
        $is_first_value = true;
        foreach ($this->ary as $key => $value) {
            if(!$is_first_value)
            {
                $q = $q.' AND ';
            }
            else 
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