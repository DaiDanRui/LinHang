<?php
session_start();

unset($_SESSION['current_login_user']);
unset($_SESSION['curennt_login_id']);
session_unset();
session_destroy();
header('Location:Login.php');
