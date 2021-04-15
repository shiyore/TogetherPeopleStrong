<?php
namespace App\Models;

class AffinityModel
{
    private $id;
    private $title;
    
    public function __construct(int $id, string $t)
    {
        $this->id = $id;
        $this->title = $t;
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
}