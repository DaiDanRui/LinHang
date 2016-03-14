<?php
        //设置编码为UTF-8，以避免中文乱码
        
        header('Content-Type:text/html;charset=utf-8');
        
        $fileArray = $_FILES['pictures'];//获取多个文件的信息，注意：这里的键名不包含[]
        $upload_dir = 'upload/'; //保存上传文件的目录
        foreach ( $fileArray['error'] as $key => $error) {
                if ( $error == UPLOAD_ERR_OK ) { //PHP常量UPLOAD_ERR_OK=0，表示上传没有出错
                       $temp_name = $fileArray['tmp_name'][$key];
                       $tuozhan=explode("/",$fileArray['type'][$key]);
                       $file_name = uniqid().'.'.$tuozhan[1];
                        move_uploaded_file($temp_name, $upload_dir.$file_name);
                        echo '上传[文件'.$key.']成功!<br/>';
                   }else {
                            echo '上传[文件'.$key.']失败!<br/>';
                        }
                    }
        ?>
