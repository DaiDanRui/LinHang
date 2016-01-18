
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
hello world!<br>

<?php
include_once 'User.php';
$user = new User();
$user->user_is_seller  = 1;
$user->user_log_name   = 'linghang';
$user->user_password   = 'linghang';

$user->user_legal_name = '领行';
$user->user_school     = '南京大学';
$user->user_school_id  = '141250300';

$user->user_phone_number = '123456789101';
$user->user_email        =  '381675152@qq.com';

$user->user_nick_name    =  '领行';
$user->birthday          =  date('Y-m-d H:i:s',time());

$user->is_active         = 1;
$user->last_log          =  date('Y-m-d H:i:s',time());
if($user->insert_to_DB()){
    echo $user->birthday;
}else{
    echo 'failed';
}
?>

</body>
</html>

