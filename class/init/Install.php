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
        //检测连接
        if(!$this->conn){
            die("connect failed:". mysqli_connect_error());
        }else{
            echo "success";
        }
        echo "<br/>";
    
        
        $this->sql_query('CREATE', Config::DB_NAME);
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
     * @param string $operation  just as create or drop DATABASE
     * @param string $db_name the name of database
     */
    private function  sql_query( $operation, $db_name){
        $sql_operation = $operation.' DATABASE '.$db_name;
        $result = NULL;
        if(mysqli_query($this->conn, $sql_operation)){
            echo "database $operation successfully";
            $result = true;
        }else{
            echo "Error $operation database:". mysqli_error($this->conn);
            $result = false;
        }
        echo "<br/>";
        return $result;
    }
}

?>