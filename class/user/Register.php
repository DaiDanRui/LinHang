<?php
include_once 'User.php';
class Register
{
    /**
     * @var User
     */
    private $user;
    
    /**
     * 
     * @param User $u
     */
    public function __construct($u){
        $this->user = $u;
    }
    
    /**
     * @see User.insert_to_DB()
     */
    public function Register(){
        $this->user->insert_to_DB();
    }
}

?>