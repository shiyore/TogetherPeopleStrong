<?php
namespace App\Services\Businesses;

use App\Services\Data\UserDAO;
use App\Services\Data\DBConnect;

class UserService
{
    public function getAllUsers()
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->getAllUsers();
    }
    
    public function checkAffinity($key)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->checkAffinity($key);
    }
    
    public function addThisAffinity($key, $uid)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->addThisAffinity($key, $uid);
    }
    
    public function getAllAffinities()
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->getAllAffinities();
    }
    
    public function getAffinityUsers(int $id)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->getAffinityUsers($id);
    }
}

