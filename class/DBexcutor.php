<?php
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @date    
 */
abstract class DBexcutor
{
    /**
     * 短链接， 数据库连接交给SQLexcute，  后置包括数据库关闭
     */
    public function excute_without_conn() {
    
        include_once('SQLexcute.php');
        $excute = new SQLexcute($this->getSQL());
        return $excute->excute();
    }
    
    
    /**
     * 长链接， 数据库连接由调用者提供
     * @param unknown $conn 数据库连接，前置包括数据库连接与选择； 后置不负责数据库连接与关闭
     */
    public function excute($conn)
    {
        return mysqli_query($conn, $this->getSQL());
    }
    
    /**
     * @return string sql 语句
     */
    protected abstract  function getSQL();
}

?>