<?php
namespace App\Services\Businesses;

use App\Services\Data\UserDAO;
use App\Services\Data\DBConnect;
use Illuminate\Support\Facades\Auth;
use App\Models\AffinityModel;

class UserService
{
    public function getAllUsers()
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->getAllUsers();
    }
    
    public function getUser(int $id)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->getUser($id);
    }
    
    public function getUsersFromAffinity(int $id)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->getUsersFromAffinity($id);
    }
    
    public function checkAffinity($key)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->checkAffinity($key);
    }
    
    public function getAffinity($id)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->getAffinity($id);
    }
    public function checkIfJoined($id)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        $uid = Auth::id();
        return $DAO->checkIfJoined($id,$uid);
    }
    public function addThisAffinity($id, $uid)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->addThisAffinity($id, $uid);
    }
    public function removeThisAffinity($id, $uid)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->removeThisAffinity($id, $uid);
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
    
    public function createAffinity(string $title)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->createAffinity($title);
    }
    
    public function deleteAffinity(int $id)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->deleteAffinity($id);
    }
    
    public function updateAffinity(AffinityModel $affinity)
    {
        $DAO = new UserDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->updateAffinity($affinity);
    }
}

