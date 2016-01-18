<?php
include_once 'User.php';
class Login
{
    private $log_name;
    private $password;
    /**
     * @var User
     */
    private $user;
    public function __construct($n,$p){
        $this->log_name = $n;
        $this->password = $p;
        $this->user = new User();
    }

    /**
     * @see User
     */
    public function login() {
        return $this->user->login($this->log_name, $this->password);
    }
}

?>