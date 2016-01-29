<?php

class DBtraverser
{
    private $table_name;
    private $where;
    
    public function __construct($name,$where){
        $this->where = $where;
        $this->table_name = $name;
    }
    public function traverse(){
        $q = 'select * '.$this->table_name.' '.$this->where;
        include_once('SQLexcute.php');
        $excute = new SQLexcute($q);
        return $excute->excute();
    }
}

?>