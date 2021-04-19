<?php
/*
 * Project: TogetherPeopleStrong ver.5
 * @author: Aiden Yoshioka
 * Module: Postings ver. 1
 * Date: 04/18/21
 * Synopsis: Model to hold Job posting data.
 * References: This is referenced by the AdminController, UserLevelController, and the Security DAO.
 */
namespace App\Models;

class Posting implements \JsonSerializable
{
    private $id;
    private $title;
    private $description;
    private $desired_skills;
    
    public function __construct(int $id,String $title, String $description, String $desired_skills){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->desired_skills = $desired_skills;
    }
    
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDesired_skills()
    {
        return $this->desired_skills;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $desired_skills
     */
    public function setDesired_skills($desired_skills)
    {
        $this->desired_skills = $desired_skills;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

        
    
}

