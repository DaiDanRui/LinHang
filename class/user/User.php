<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//include_once ("../Config.php");
$path = dirname(dirname(__FILE__));
include_once($path.'/Config.php');
include_once('ResultReturn.php');
/**
 * Created by PhpStorm.
 * User: raychen
 * Date: 16/1/17
 * Time: 19:48
 * @deprecated 成员变量由关联数据代替
 */
class User
{
    private $table_name;
    
    
    //以下各项对应于数据库表tbl_user中的项
    public $user_id  ;
    public $user_is_seller    ;
    public $user_log_name     ;
    public $user_password      ;
    
    public $user_legal_name     ;
    public $user_school         ;
    public $user_school_id      ;
    public $user_sex;
    
    public $user_phone_number   ;
    public $user_email          ;
    
    public $user_nick_name      ;
    public $user_birthday            ;
    
    public $user_is_active           ;
    public $user_last_log            ;
    
    
    /**
     * 不初始化数据库连接，
     * 初始化table_name，用户表名
     */
    public function __construct(){
        $this->table_name = Config::table_user;
    }
    
    /**
     * 根据用户名完善用户信息
     * @param unknown $log_name 用户名必须是实际存在的 否则返回false
     */
    protected function complete_user_info($log_name){
        
        $this->user_log_name = $log_name;
        $retval = $this->search();
        if(!($retval)){
            echo "erro: no sorce<br/>";
            return false;
        }
        $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        if($row){//如果该用户存在则更新，返回true
            $this->user_id = $row['user_id'] ;
            $this->user_is_seller = $row['user_is_seller'] ;
            $this->user_log_name  = $row['user_log_name'];
            $this->user_password  =  $row['user_password'];
            
            $this->user_legal_name  = $row['user_legal_name'];
            $this->user_school  = $row['user_school'];
            $this->user_school_id = $row['user_school_id'];
            $this->user_sex = $row['user_sex'];
            
            $this->user_phone_number = $row['user_phone_number'];
            $this->user_email = $row['user_email'];
            
            $this->user_nick_name = $row['user_nick_name'];
            $this->user_birthday = $row['user_birthday'];
            
            $this->user_is_active = $row['user_is_active'];
            $this->user_last_log  = $row['user_last_log'];
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
            if($password == $this->user_password){
                return ResultReturn::log_verify_pass;
            }else {
                return ResultReturn::password_wrong;
            }
        }else {
            return ResultReturn::log_name_not_exist;
        }
    }
    
    
    public function insert_to_DB()
    {
        if($this->search()){
            return ResultReturn::log_name_already_exist;
        }
        $query = "INSERT  into $this->table_name
                  (
                  user_is_seller    ,
                  user_log_name     ,
                  user_password      ,
    
                  user_legal_name     ,
                  user_school         ,
                  user_school_id      ,
                  user_sex            ,
    
                  user_phone_number   ,
                  user_email          ,
    
                  user_nick_name      ,
                  user_birthday            ,
    
                  user_is_active           ,
                  user_last_log            
        ) values (
                 
                  '$this->user_is_seller'    ,
                  '$this->user_log_name'     ,
                  '$this->user_password'      ,
    
                  '$this->user_legal_name'     ,
                  '$this->user_school'         ,
                  '$this->user_school_id'      ,
                  '$this->user_sex'            ,
                  
                  '$this->user_phone_number'   ,
                  '$this->user_email'          ,
    
                  '$this->user_nick_name'      ,
                  '$this->user_birthday'            ,
    
                  '$this->user_is_active'           ,
                  '$this->user_last_log'            
        )";
        
        if( $this->excute_query($query)){
            return ResultReturn::register_pass;
        }else{
            return ResultReturn::register_failed;
        }
        
    }
    
    public function update_DB()
    {
        if(! $this->search()){
            return false;
        }
        $query = "update $this->table_name 
                  set 
                  user_is_seller = '$this->user_is_seller'   ,
                  
                  user_password  = '$this->user_password'    ,
    
                  user_legal_name  = '$this->user_legal_name'   ,
                  user_school      = '$this->user_school'   ,
                  user_school_id   = '$this->user_school_id'  ,
                  user_sex         = '$this->user_sex',
                  
                  user_phone_number = '$this->user_phone_number'  ,
                  user_email        = '$this->user_email'  ,
    
                  user_nick_name    = '$this->user_nick_name'  ,
                  user_birthday          = '$this->birthday'  ,
    
                  user_is_active         = '$this->is_active'  ,
                  user_last_log          = '$this->last_log'
                  WHERE user_id  = '$this->user_id'
        ";
        return $this->excute_query($query);
    }
    
    /**
     * 同名用户是否已经存在
     * @return number ResultReturn：：
     */
    public function is_exist(){
        $search_result = $this->search();
        $test=mysqli_fetch_array($search_result, MYSQLI_ASSOC);
        if($test){
            return ResultReturn::log_name_already_exist;
        }else {
            return ResultReturn::log_name_not_exist;
        }
    }
    
    /**
     * just return the search result
     * @return false when not exist,
     *         search result when exist
     */
    protected function search(){
        $query = "select * from $this->table_name
        WHERE user_log_name = '$this->user_log_name'";
        return $this->excute_query($query);
    }
    
    protected function excute_query($query){
        $conn = Config::connect();
        $result =  mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }
    
    public function __destruct(){
    }
    
    
}