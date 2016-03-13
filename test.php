<?php
foreach($_FILES['into']['tmp_name'] as $key=>$value){
    $base_path = 'upload/';
    $name =  $base_path.uniqid();
    move_uploaded_file($value, $name);
    echo '<br/>1';
}