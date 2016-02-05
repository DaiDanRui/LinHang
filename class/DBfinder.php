<?php
include_once 'DBexcutor.php';
class DBfinder extends DBexcutor
{
    private $table_name;
    private $ary;
    /**
     * @param unknown $name 数据库表名
     * @param ArrayObject $ary关联数组所有键都必须是数据库中 字段名 也就是在Config_文件中存在
     */
    public function __construct($name,$ary){
        $this->ary = $ary;
        $this->table_name = $name;
    }
    /**
     * 没有进行 mysqli_fetch_array($retval, MYSQL_ASSOC)
     */
    /* public function excute_without_conn()
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
        return $q;
    }
}

?>