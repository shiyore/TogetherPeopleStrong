<?php
namespace App\Models;

class UserDataModel implements \JsonSerializable
{
    private $name;
    private $email;
    
    public function __construct($f, $e)
    {
        $this->name = $f;
        $this->email = $e;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}