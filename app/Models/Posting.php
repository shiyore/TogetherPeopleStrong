<?php
namespace App\Models;

class Posting
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
        
    
}

