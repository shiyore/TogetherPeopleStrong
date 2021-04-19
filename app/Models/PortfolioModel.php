<?php
/*
 * Project: TogetherPeopleStrong ver.7
 * @author: Carson Perry
 * Module: Portfolios ver. 2
 * Date: 04/18/21
 * Synopsis: This is the model to hold information of portfolios. Bio was added later to allow for a section of markdown test to allow for a more customized portfolio.
 * References: This is referenced by the Portfolio Controller and the portfolio DAO to hold portfolio information.
 */
namespace App\Models;

class PortfolioModel
{
    //private $user;
    private $name;
    private $position;
    private $experience;
    private $proficiencies;
    private $bio;
    
    public function __construct($u, $po, $ex, $pr, $bi)
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