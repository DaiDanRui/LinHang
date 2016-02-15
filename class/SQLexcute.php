<?php
include_once ('config.php');
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @date    
 */
class SQLexcute
{
    private $query;
    public function __construct($q){
        $this->query = $q;
    }
    public function excute(){
        $conn = Config::connect();
        $result =  mysqli_query($conn, $this->query);
        mysqli_close($conn);
        return $result;
    }
}

?>