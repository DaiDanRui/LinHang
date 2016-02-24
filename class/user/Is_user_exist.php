<?php

 /**
  *****************************************************************************************************************************
  * created by zend
  * 根据用户唯一名判断是否存在
  * @author darxan 
  * @version 2016年2月15日
  * @date 
  * @deprecated    
  */
class Is_user_exist
{
    private $user_name;
    public function __construct($user_name)
    {
        $this->user_name = $user_name;
    }
    /**
     * @deprecated
     */
    public function is_exist() {
        $path = dirname(dirname(__FILE__));
        include_once($path.'/DBtraverser.php');
        include_once($path.'/Config.php');
        include_once($path.'/Config_user.php');
        $ary = 'where '.Config_user::log_name.' =  ' ." '$this->user_name' ";
        $myDBfinder = new DBtraverser(Config_user::table_name, $ary);
        $retval = $myDBfinder->excute_without_conn();
        if(mysqli_num_rows($retval)==0){
            return false;
        }
        else 
        {
            return true;
        }
        
    }
}

?>