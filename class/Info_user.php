<?php

class Info_user
{
    public static function get_user_info_by_id($conn,$id)
    {
        include_once('class/Config_user.php');
        require_once 'DBtraverser.php';
        $myDBtraveser = new DBtraverser(Config_user::table_name, ' where '.Config_user::id."='$id'");
        $retval = $myDBtraveser->excute($conn);
        $array = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        mysqli_free_result($retval);
        return $array;
    }
    
    public static function get_user_info($conn,$username)
    {
        include_once('class/Config_user.php');
        require_once 'DBtraverser.php';
        $myDBtraveser = new DBtraverser(Config_user::table_name, ' where '.Config_user::log_name."='$username'");
        $retval = $myDBtraveser->excute($conn);
        $array = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        mysqli_free_result($retval);
        return $array;
    }
    
    public static function get_user_avatar($conn,$username)
    {
        include_once('class/Config_user.php');
        $query = 'select '.Config_user::pic_path.' from '.Config_user::table_name.
        ' when '.Config_user::log_name.' = '."'$username'";
        
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
        $query = 'select '.Config_user::pic_path.','.Config_user::log_name. 
                  'from'.Config_user::table_name.
                  ' when '.Config_user::id.' = '."'$user_id'";
    
        $retval = mysqli_query($conn, $query);
        $array = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        mysqli_free_result($retval);
        return $array;
    }
        
}

?>