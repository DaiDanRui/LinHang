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
    
   /*  public static function file_upload()
    {
        $max_files=5; //最多上传文件的个数，与 up.htm 中的 input file 控件的个数相同
        $up_ok_files=0; //成功上传的文件个数
        $up_folder="ups"; //保存上传文件的目标文件夹
        if(isset($_FILES['myfile'])){
            //由于 $_FILES['myfile'] 是个数组，所以需要使用循环遍历
            for($i=0;$i<$max_files;$i++){
                //如果未出错
                if($_FILES['myfile']['error'][$i]==0){
                    if(move_uploaded_file($_FILES['myfile']['tmp_name'][$i],$up_folder."/".$_FILES['myfile']['name'][$i])){
                        //成功上传后，计数器增 1
                        $up_ok_files +=1;
                    }
                    else{
                        echo "<h4 style='color:red;'>在服务器中保存失败</h4>";
                    }
                }
            }
            echo "<h4>成功上传 ".$up_ok_files. " 个文件</h4>";
        }
    } */
    
   
    /* public static function  upload_v3()
    {
        
        header('Content-Type:text/html;charset=utf-8');
        $fileArray = $_FILES['upload_file'];//获取多个文件的信息，注意：这里的键名不包含[]
        $upload_dir = 'D:/upload/'; //保存上传文件的目录
        foreach ( $fileArray['error'] as $key => $error) {
                if ( $error == UPLOAD_ERR_OK ) { //PHP常量UPLOAD_ERR_OK=0，表示上传没有出错
                        $temp_name = $fileArray['tmp_name'][$key];
                        $file_name = $fileArray['name'][$key];
                        move_uploaded_file($temp_name, $upload_dir.$file_name);
                        echo '上传[文件'.$key.']成功!<br/>';
                    }else {
                            echo '上传[文件'.$key.']失败!<br/>';
                        }
        
                    }
        
                
    } */
}

?>