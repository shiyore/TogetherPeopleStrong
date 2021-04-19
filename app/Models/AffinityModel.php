<?php
namespace App\Models;

class AffinityModel
{
    private $id;
    private $title;
    private $ownerID;
    
    public function __construct(int $id, string $t, int $uid)
    {
        $this->id = $id;
        $this->title = $t;
        if ($uid != null || $uid >0)
            $this->ownerID = $uid;
        else
            $this->ownerID = 0;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setTitle(string $t)
    {
        $this->title = $t;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getOwner()
    {
        return $this->ownerID;
    }
}