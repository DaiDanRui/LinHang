<?php
include_once 'DBexcutor.php';
class DBtraverser extends DBexcutor
{
    private $table_name;
    private $where;
    
    public function __construct($name,$where){
        $this->where = $where;
        $this->table_name = $name;
    }
    /* public function excute_without_conn(){
        
        include_once('SQLexcute.php');
        $excute = new SQLexcute($this->getSQL());
        return $excute->excute();
    } */
    
    /**
     * @return string sql 语句
     */
    protected function getSQL()
    {
        return  'select * '.$this->table_name.' '.$this->where;
    }
}

?>