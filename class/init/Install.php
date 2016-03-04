<?php
include '../Config.php';
/**
 * 
 ****************************************************************************************************
 * created by zend
 * @author darxan 
 * @date 2016年1月18日
 ****************************************************************************************************
 */
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
            echo "success to connect";
        }
        echo "<br/>";
        
        //$this->create_database_query( Config::DB_NAME);
        mysqli_select_db($this->conn, Config::DB_NAME);
        $this->initialDBTable();
      //$this->sql_query('DROP', self::DB_NAME);
        $this->conn->close();
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
    
    
    private function  initialDBTable(){
        /* require_once 'Table_user.php';
        $table_user = new Table_user($this->conn);
        $table_user->initTable(); */
        
         /* require_once 'Table_commodity.php';
         $table_commodity = new Table_commodity($this->conn);
        $table_commodity->initTable(); */
        
        /* require_once 'Table_evaluation.php';
        $table_commodity = new Table_evaluation($this->conn);
        $table_commodity->initTable(); */
        
        /* require_once 'Table_commodity_type.php';
         $table_commodity = new Table_commodity_type($this->conn);
         $table_commodity->initTable(); */
        
        
        
        
        /*  require_once 'Table_transaction.php';
         $table_commodity = new Table_transaction($this->conn);
         $table_commodity->initTable(); */
        
        require_once 'Table_praise.php';
        $table_commodity = new Table_praise($this->conn);
        $table_commodity->initTable();
        
        /* require_once 'Table_leave_message.php';
        $table_commodity = new Table_leave_message($this->conn);
        $table_commodity->initTable(); */
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Title</title>
</head>
<body>
<br>

<?php


$a = new Install();
$a->init();
?>

</body>
</html>
?>