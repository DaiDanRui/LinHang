<?php

class Picture_upload
{
    const erro_upload_ok = 0;
    const erro_oversize = 1;
    const erro_format = 2;
    const erro_upload_failed = 3;
    /**
     * 检查上传图片是否成功
     */
    public static function error_message($file)
    {
        if($_FILES[$file]["size"] > 20000)
        {
            return self::erro_oversize;
        }
        else if(   ($_FILES[$file]["type"] != "image/gif")
                && ($_FILES[$file]["type"] != "image/jpeg")
                && ($_FILES[$file]["type"] != "image/pjpeg"))
        {
                return self::erro_format;
        }
        else if($_FILES[$file]["error"] > 0)
        {
            return self::erro_upload_failed;
        }
        else
        {
            return self::erro_upload_ok;
        }
    }
    
    public static function save_picture($base_path,$file)
    {
        $name =  $base_path.uniqid();
        move_uploaded_file($_FILES[$file]["tmp_name"],
            $name);
        return $name;
    }
 
    public static function uplpad_pictures($submit_name){
        $names_array = array();
        $fileArray = $_FILES['into'];//获取多个文件的信息，注意：这里的键名不包含[]
        $upload_dir = 'upload/'; //保存上传文件的目录
        foreach ( $fileArray['error'] as $key => $error) {
            if ( $error == UPLOAD_ERR_OK ) { //PHP常量UPLOAD_ERR_OK=0，表示上传没有出错
                $temp_name = $fileArray['tmp_name'][$key];
                $tuozhan=explode("/",$fileArray['type'][$key]);
                $file_name = uniqid().'.'.$tuozhan[1];
                move_uploaded_file($temp_name, $upload_dir.$file_name);
                $names_array[] = $file_name;
            }
            
        }
        return $names_array;
        
    }
    
}

?>