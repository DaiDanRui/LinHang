<?php
session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
    
}
//如果没有登陆
else {
    include 'Login.php';
}