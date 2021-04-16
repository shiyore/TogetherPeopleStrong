<?php
namespace App\Models;

class PortfolioModel
{
    //private $user;
    private $name;
    private $position;
    private $experience;
    private $proficiencies;
    private $bio;
    
    public function __construct($u, $po, $ex, $pr, String $bi)
    {
        //$this->user = $u;
        $this->name = $u;
        $this->position = $po;
        $this->experience = $ex;
        $this->proficiencies = $pr;
        $this->bio = $bi;
    }
    
    /*public function getUser()
    {
        return $this->user;
    }*/
    public function getName()
    {
        return $this->name;
    }
    public function getPosition()
    {
        return $this->position;
    }
    public function getExperience()
    {
        return $this->experience;
    }
    public function getProficiencies()
    {
        return $this->proficiencies;
    }
    public function getBio()
    {
        return $this->bio;
    }
}