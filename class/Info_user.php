<?php

class Info_user
{
    const logname_not_exsit = 1;
    const wrong_pass_word = 2;
    const done = 3;
    public static function updateInfo($logname,$pwd,$conn,$newPwd){
        require_once 'Config_user.php';
        require_once 'DBtraverser.php';
        $where = ' where '.Config_user::log_name."='$logname'";
        $myDBtraveser = new DBtraverser(Config_user::table_name, $where);
        $retval = $myDBtraveser->excute($conn);
        if (mysqli_num_rows($retval)==0){
            return self::logname_not_exsit;
        }
        $array = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        if($array[Config_user::password]!=$pwd){
            return self::wrong_pass_word;
        }
        $query = 'update '.Config_user::table_name. ' set '.Config_user::password.' = '."'$newPwd' ".$where;
        mysqli_query($conn, $query);
        return self::done;
        
    }
    
    
    public static function  get_user_account($conn,$id){
        require_once 'Config_user.php';
        $query = ' select '.Config_user::income.','.Config_user::pay.
        ' from '.Config_user::table_name.
        ' where '.Config_user::id.' = '."'$id'";
        $retval = mysqli_query($conn, $query);
        $array = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        return $array;
    }
    
    public static function get_user_info_by_id($conn,$id)
    {
        require_once('Config_user.php');
        require_once 'DBtraverser.php';
        $myDBtraveser = new DBtraverser(Config_user::table_name, ' where '.Config_user::id."='$id'");
        $retval = $myDBtraveser->excute($conn);
        $array = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        mysqli_free_result($retval);
        return $array;
    }
    
    public static function get_user_info($conn,$username)
    {
        require_once('Config_user.php');
        require_once 'DBtraverser.php';
        $myDBtraveser = new DBtraverser(Config_user::table_name, ' where '.Config_user::log_name."='$username'");
        $retval = $myDBtraveser->excute($conn);
        $array = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        mysqli_free_result($retval);
        return $array;
    }
    
    public static function get_user_avatar($conn,$username)
    {
        require_once ('class/Config_user.php');
        $query = 'select '.Config_user::pic_path.' from '.Config_user::table_name.
        ' where '.Config_user::log_name.' = '."'$username'";
        
        $retval = mysqli_query($conn, $query);
        $array = mysqli_fetch_array($retval, MYSQLI_NUM);
        if($array && isset($array[0]))
        {
            $avatar_path = $array[0];
        }else{
            $avatar_path = 'upload/default.jpg';
        }
        return $avatar_path;   
    }
    
    public static function get_user_avatar_and_logname($conn,$user_id)
    {
        include_once('class/Config_user.php');
        $query = ' select '.Config_user::pic_path.','.Config_user::log_name. 
                  ' from '.Config_user::table_name.
                  ' where '.Config_user::id.' = '."'$user_id'";
        $retval = mysqli_query($conn, $query);
        $array = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        mysqli_free_result($retval);
        return $array;
    }
    public static function get_user_logname($conn,$user_id)
    {
        include_once('class/Config_user.php');
        $query = ' select '.Config_user::log_name.
        ' from '.Config_user::table_name.
        ' where '.Config_user::id.' = '."'$user_id'";
        $retval = mysqli_query($conn, $query);
        $array = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        mysqli_free_result($retval);
        return $array[Config_user::log_name];
    }
        
}

?>