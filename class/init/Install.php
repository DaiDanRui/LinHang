<?php
/**			
 * @author yan
 * @version 2016/1/18
 */
 include '../Config.php';
class Install
{
    
    private  $conn = NULL;
    
     
    /**
     * create database
     * create tables
     */
    public function init(){
        $this->conn = mysqli_connect(Config::HOST, Config::USER, Config::PASSWORD);
        mysqli_query($this->conn,"SET NAMES 'UTF8'");
        //检测连接
        if(!$this->conn){
            die("connect failed:". mysqli_connect_error());
        }else{
            echo "success";
        }
        echo "<br/>";
        
      //  $this->create_database_query( Config::DB_NAME);
        mysqli_select_db($this->conn, Config::DB_NAME);
        $this->initialDBTable();
      //$this->sql_query('DROP', self::DB_NAME);
        $this->conn->close();
    }
    
    private function  initialDBTable(){
        require_once 'Table_user.php';
        $table_user = new Table_user($this->conn);
        $table_user->initTable();
    }
    /**
     * @param string $CREATE  just as create  DATABASE
     * @param string $db_name the name of database
     */
    private function  create_database_query( $db_name){
        $sql_operation = 'CREATE DATABASE '.$db_name." DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
        $result = NULL;
        if(mysqli_query($this->conn, $sql_operation)){
            echo 'database CREATE successfully';
            $result = true;
        }else{
            echo 'Error CREATE database:'. mysqli_error($this->conn);
            $result = false;
        }
        echo "<br/>";
        return $result;
    }
}

?>