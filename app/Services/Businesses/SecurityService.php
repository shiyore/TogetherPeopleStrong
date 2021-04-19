<?php
/*
 * Project: TogetherPeopleStrong ver.5
 * @author: Aiden Yoshioka
 * Module: Admin ver. 2 and Postings ver. 2 
 * Date: 04/18/21
 * Synopsis: This is the Security service to contact and pass information to the Security Data Access Object.
 * References: This is references the SecurityDAO and is referenced by the admin controller and the user level controller.
 */
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
    public function getPostingsByName(String $name)
    {
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->getPostingsByName($name);
    }
    
    //adds a user to an application
    public function addApplication($user_id , $posting_id){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        $this->verifyCred->apply($user_id, $posting_id);
    }
    
    //checks if a user ass already applied
    public function checkApplied($user_id, $posting_id){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->check_applied($user_id, $posting_id);
    }
    
    //searches for postings
    public function search_postings($search){
        $this->verifyCred = new SecurityDAO(new DBConnect("togetherpeoplestrong"));
        return $this->verifyCred->search_postings($search);
    }
}
?>