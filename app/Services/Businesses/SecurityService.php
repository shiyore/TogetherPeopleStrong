<?php
namespace App\Services\Businesses;

use App\Models\AdminModel;
use App\Models\Posting;
use App\Services\Data\SecurityDAO;
use App\Services\Data\DBConnect;
use App\Models\UserModel;

class SecurityService{
    private $verifyCred;
    
    public function login(AdminModel $admin_user){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->admin_login($admin_user);
    }
    
    public function getUsers(){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->getUsers();
    }
    public function suspendUser(UserModel $user){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->suspendUser($user);
    }
    public function deleteUser(UserModel $user){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->deleteUser($user);
    }
    
    //methods for managing job postings
    public function getPostings(){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->getPostings();
    }
    //adds a new posting
    public function addPosting(string $title,string $description,string $skills){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        $this->verifyCred->addPosting($title, $description,$skills);
    }
    //gets a specific post from the post's ID mainly used in the postings page
    public function getPosting(String $id){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->getPosting($id);
    }
    //takes in a post to update a post's content to the new post's info
    public function updatePosting(Posting $posting){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->updatePosting($posting);
    }
    //takes in the id to delete a post
    public function deletePosting($id){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->deletePosting($id);
    }
}
?>