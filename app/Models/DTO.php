<?php
namespace App\Models;

class DTO implements \JsonSerializable
{
    private $errorCode;
    private $errorMessage;
    private $data;
    public function __construct($ec, $em, $d)
    {
        $this->errorCode = $ec;
        $this->errorMessage = $em;
        $this->data = $d;
    }
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

