<?php
class Config
{
    /**
     * 数据库站点
     * @var unknown
     */
    const  HOST = '127.0.0.1';
    /**
     * 数据库用户名
     * @var unknown
     */
    const  USER = 'root';
    /**
     * 数据库密码
     * @var unknown
     */
    const  PASSWORD = 'root';
    /**
     * 数据库名
     * @var unknown
     */
    const  DB_NAME = 'LGdreamer_linghang_mainDB';
    /**
     * 用户表：table_user
     * @var unknown
     */
    const  table_user = 'tbl_user';
    
    static function  connect(){
        $conn = mysqli_connect(Config::HOST, Config::USER, Config::PASSWORD, Config::DB_NAME);
        mysqli_query($conn,"SET NAMES 'UTF8'");
        return $conn;
    }
}

?>