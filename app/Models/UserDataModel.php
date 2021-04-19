<?php
/*
 * Project: TogetherPeopleStrong ver.6
 * @author: Carson Perry
 * Module: RestAPI ver. 1
 * Date: 04/18/21
 * Synopsis: This is a json serializable model used to return just a small amount of user information that is ok for api users to have.
 * References: This is referenced by the Rest controller.
 */
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