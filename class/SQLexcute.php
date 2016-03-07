<?php

/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @date    
 */
class SQLexcute
{
    /* private $query;
    public function __construct($q){
        $this->query = $q;
    }
    public function excute(){
        $conn = Config::connect();
        $result =  mysqli_query($conn, $this->query);
        mysqli_close($conn);
        return $result;
    }
     */
    /**
     * php的类成员其实并无明显的动静态之分，所有成员在没明确声明的情况下都会被当成静态成员存放在特定的内存区<br>
     * 如果能将类的方法定义成static，就尽量定义成static，它的速度会提升将近1倍。<br>
     * 
     * @param unknown $sql
     */
    public static function excute($sql)
    {
        //echo $sql." dfdlfkdlkfdmfkdlj";
        include_once ('config.php');
        $conn = Config::connect();
        $result =  mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
}

?>