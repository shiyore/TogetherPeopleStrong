<?php
/*
 * Project: TogetherPeopleStrong ver.1
 * @author: Carson Perry
 * Module: Users ver. 1
 * Date: 04/18/21
 * Synopsis: This is the model to hold user information.
 * References: This is referenced by the User controller and User DAO.
 */
namespace App\Models;

class UserModel implements \Serializable{
    private $username;
    private $email;
    private $password;
    private $ssn;
    

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

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
    public function getSsn()
    {
        return $this->ssn;
    }
    

    public function __construct($username, $email, $password, $ssn){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->ssn = $ssn;
    }
    public function serialize()
    {return get_object_vars($this);}

    public function unserialize($serialized)
    {return get_object_vars($this);}

    
    
}
?>