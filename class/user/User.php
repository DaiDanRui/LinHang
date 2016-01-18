<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

/**
 * Created by PhpStorm.
 * User: raychen
 * Date: 16/1/17
 * Time: 19:48
 */
include_once '../Config.php';
class User
{
    private $conn;
    private $table_name;
    
    
    //以下各项对应于数据库表tbl_user中的项
    public $user_id  ;
    public $user_is_seller    ;
    public $user_log_name     ;
    public $user_password      ;
    
    public $user_legal_name     ;
    public $user_school         ;
    public $user_school_id      ;
    
    public $user_phone_number   ;
    public $user_email          ;
    
    public $user_nick_name      ;
    public $birthday            ;
    
    public $is_active           ;
    public $last_log            ;
    
    
    /**
     * 初始化数据库连接
     * 初始化table_name，用户表名
     */
    public function __construct(){
        $this->conn = Config::connect();
        if(!$this->conn){
            die('cannot connect to the database');
        }
        $this->table_name = Config::table_user;
    }
    
    /**
     * 根据用户名完善用户信息
     * @param unknown $log_name 用户名必须是实际存在的 否则返回false
     */
    public function complete_user_info($log_name){
        
        $this->user_log_name = $log_name;
        $retval = $this->search();
        $row = mysql_fetch_array($retval, MYSQL_ASSOC);
        if($row){//如果该用户存在则更新，返回true
            $this->user_id = $row['user_id'] ;
            $this->user_is_seller = $row['user_is_seller'] ;
            $this->user_log_name  = $row['user_log_name'];
            $this->user_password  =  $row['user_password'];
            
            $this->user_legal_name  = $row['user_legal_name'];
            $this->user_school  = $row['user_school'];
            $this->user_school_id = $row['user_school_id'];
            
            $this->user_phone_number = $row['user_phone_number'];
            $this->user_email = $row['user_email'];
            
            $this->user_nick_name = $row['user_nick_name'];
            $this->birthday = $row['birthday'];
            
            $this->is_active = $row['is_active'];
            $this->last_log  = $row['last_log'];
            return true;
        }else {//如果用户不存在，返回false
            return false;
        }
        
        
    }
    
    /**
     * 用户名存在或者密码正确则登录成功
     * @param unknown $log_name 登录名
     * @param unknown $password 密码
     * @return boolean
     */
    public function login($log_name, $password){
        if($this->complete_user_info($log_name)){
            return $password == $this->user_password;
        }else {
            return false;
        }
    }
    
    
    public function insert_to_DB()
    {
        if($this->search()){
            return false;
        }
        $query = "INSERT  into $this->table_name
                  (
                  user_is_seller    ,
                  user_log_name     ,
                  user_password      ,
    
                  user_legal_name     ,
                  user_school         ,
                  user_school_id      ,
    
                  user_phone_number   ,
                  user_email          ,
    
                  user_nick_name      ,
                  birthday            ,
    
                  is_active           ,
                  last_log            
        ) values (
                 
                  '$this->user_is_seller'    ,
                  '$this->user_log_name'     ,
                  '$this->user_password'      ,
    
                  '$this->user_legal_name'     ,
                  '$this->user_school'         ,
                  '$this->user_school_id'      ,
    
                  '$this->user_phone_number'   ,
                  '$this->user_email'          ,
    
                  '$this->user_nick_name'      ,
                  '$this->birthday'            ,
    
                  '$this->is_active'           ,
                  '$this->last_log'            
        )";
        return mysqli_query($this->conn, $query);
    }
    
    public function update_DB()
    {
        if(! $this->search()){
            return false;
        }
        $query = "update $this->table_name 
                  set 
                  user_is_seller = $this->user_is_seller   ,
                  
                  user_password  = $this->user_password    ,
    
                  user_legal_name  = $this->user_legal_name   ,
                  user_school      = $this->user_school   ,
                  user_school_id   = $this->user_school_id  ,
    
                  user_phone_number = $this->user_phone_number  ,
                  user_email        = $this->user_email  ,
    
                  user_nick_name    = $this->user_nick_name  ,
                  birthday          = $this->birthday  ,
    
                  is_active         = $this->is_active  ,
                  last_log          = $this->last_log
                  WHERE user_id  = $this->user_id
        ";
        return mysqli_query($this->conn, $query);
    }
        
    
    
    public function search(){
        $query = 'select * from '.$this->table_name.' WHERE user_log_name='.$this->user_log_name;
        return mysqli_query($this->conn, $query);
    }
    
    
    
    public function __destruct(){
        mysqli_close($this->conn);
    }
    
    
}