<?php
include_once ('config.php');
/**
 ****************************************************************************************************
 * created by zend
 * @author darxan 
 ****************************************************************************************************
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