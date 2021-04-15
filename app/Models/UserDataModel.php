<?php
namespace App\Models;

class UserDataModel implements \JsonSerializable
{
    private $firstName;
    private $lastName;
    private $email;
    private $phoneNum;
    
    public function __construct($f, $l, $e, $p)
    {
        $this->firstName = $f;
        $this->lastName = $l;
        $this->email = $e;
        $this->phoneNum = $p;
    }
    public function jsonSerialize()
    {
        
    }

}