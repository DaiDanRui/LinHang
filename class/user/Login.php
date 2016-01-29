<?php

class Login
{
    private $log_name;
    private $password;
    
    public function __construct($n,$p){
        $this->log_name = $n;
        $this->password = $p;
    }

    
    public function login() {
        $path = dirname(dirname(__FILE__));
        include_once($path.'/DBfinder.php');
        include_once($path.'/Config.php');
        include_once($path.'/Config_user.php');
        include_once('ResultReturn.php');
        $ary = array(
            Config_user::log_name=>$this->log_name
        );
        $myDBfinder = new DBfinder(Config_user::table_name, $ary);
        $retval = $myDBfinder->find();
        if(mysqli_num_rows($retval)==0)
        {
            return ResultReturn::log_name_not_exist;
        }
        else
        {
            $complete_ary = mysqli_fetch_array($retval, MYSQL_ASSOC);
            if( $complete_ary[Config_user::password] == $this->password )
            {
                return ResultReturn::log_verify_pass;
            }
            else 
            {
                return ResultReturn::password_wrong;
            }
        }
            
    }
}

?>