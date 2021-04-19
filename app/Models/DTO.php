<?php
/*
 * Project: TogetherPeopleStrong ver.6
 * @author: Carson Perry
 * Module: RestAPI ver. 1
 * Date: 04/18/21
 * Synopsis: Data Transfer Object for the Rest API. Contains an error code that is an int, a string error message, and an object of data. All of this is JSON Serializable for proper data return.
 * References: This is referenced by the Rest Controller to hold REST API information.
 */
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

