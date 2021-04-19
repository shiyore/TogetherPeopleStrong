<?php
/*
 * Project: TogetherPeopleStrong ver.2
 * @author: Aiden Yoshioka
 * Module: Admins ver. 1
 * Date: 04/18/21
 * Synopsis: This is the model used for ensuring an admin is logged in or not.
 * References: This is referenced by the Security Service, as well as the Security middleware for login.
 */
namespace App\Models;

class AdminModel{
    private $username;
    private $password;
    
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }
    
    
}
?>