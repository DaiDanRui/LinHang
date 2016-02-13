<?php
include_once 'DBexcutor.php';
/**
 ****************************************************************************************************
 * created by zend
 * @author darxan 
 ****************************************************************************************************
 */
class DBupdater extends DBexcutor
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
    private $ary;
    
    /**
     * @param unknown $name
     * @param ArrayObject $ary 关联数组所有键都必须是数据库中 字段名 也就是在Config_文件中存在
     */
    public function __construct($name,$ary){
        $this->ary = $ary;
        $this->table_name = $name;
    }
    
   /*  public function excute_without_conn() {
        
        include_once('SQLexcute.php');
        $excute = new SQLexcute($this->getSQL());
        return $excute->excute();
    }
    
    
    
    public function excute($conn) 
    {
        return mysqli_query($conn, $this->getSQL());
    } */
    
    
    /**
     * @return string sql 语句
     */
    protected function getSQL()
    {
        $q = 'update '.$this->table_name.' set ';
        
        $is_first_value = true;
        foreach ($this->ary as $key => $value)
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
        return $q;
    }
}

?>