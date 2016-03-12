<?php
session_start();
if(isset($_SESSION['CURRENT_LOGIN_ID']))
{
        include 'smarty_init.php';
        $smarty->display('My/my-set.html');
}else 
{
        include 'Login.php';
}