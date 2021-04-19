<?php
/*
 * Project: TogetherPeopleStrong ver.7
 * @author: Aiden Yoshioka
 * Module: Admins ver. 2, Job Postings ver. 1 
 * Date: 04/18/21
 * Synopsis: This is the Data Access Object for Admins and Job postings. This handles verifying admin login credentials, getting users, suspending them, and deleting them for admin use, as well as 
 * References: This is referenced by the PortfolioBusiness Service.
 */
namespace App\Services\Data;
use App\Models\AdminModel;
use App\Models\Posting;
use App\Models\UserModel;
use Carbon\Exceptions\Exception;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class SecurityDAO{
    
    //connection string
    private $conn;
    
    //empty constructor
    public function __construct(DBConnect $db_obj){
        //establish connection
        $this->conn = $db_obj->get_conn();
    }
    
    public function admin_login(AdminModel $admin_user){
        try{
            $query = "SELECT username , password from admins WHERE username='{$admin_user->getUsername()}' AND password='{$admin_user->getPassword()}' ";
            
            $result = mysqli_query($this->conn , $query);
            if(mysqli_num_rows($result) > 0){
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return true;
            }else{
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getUsers(){
        try{
            //users array
            $users = array();
            
            $query = "SELECT name , email, password, ssn from users";
            
            $result = mysqli_query($this->conn , $query);
            while($row = $result->fetch_assoc()) {
                array_push($users, new UserModel($row['name'],$row['email'],$row['password'],$row['ssn']));
            }
            return $users;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function suspendUser(UserModel $user){
        try{
            $query = "UPDATE `users` SET `active_status`=False WHERE name='".$user->getUsername()."' AND password='" . $user->getPassword()."'";
            
            $result = mysqli_query($this->conn , $query);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function deleteUser(UserModel $user){
        try{
            $query = "DELETE FROM `users` WHERE name='".$user->getUsername()."' AND password='" . $user->getPassword()."'";
            
            $result = mysqli_query($this->conn , $query);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    //crud methods for job postings
    public function addPosting(string $title,string $description,string $skills){
        try{
            $query = "INSERT INTO `postings`(`title`, `description`, `skills`) VALUES ('$title','$description','$skills')";
            
            $result = mysqli_query($this->conn , $query);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getPostings(){
        try{
            //users array
            $postings = array();
            
            $query = "SELECT id, title, description, skills FROM postings";
            
            $result = mysqli_query($this->conn , $query);
            while($row = $result->fetch_assoc()) {
                array_push($postings, new Posting($row['id'],$row['title'],$row['description'],$row['skills']));
            }
            return $postings;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getPosting(String $id){
        try{
            $postings = array();
            
            $query = "SELECT id, title, description, skills FROM postings WHERE id=$id";
            
            $result = mysqli_query($this->conn , $query);
            while($row = $result->fetch_assoc()) {
                array_push($postings, new Posting($row['id'],$row['title'],$row['description'],$row['skills']));
            }
            return $postings;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function updatePosting(Posting $posting){
        try{
            $title = $posting->getTitle();
            $query = "UPDATE `postings` SET `title`='$title',`description`='".$posting->getDescription()."',`skills`='".$posting->getDesired_skills()."' WHERE `id`='".$posting->getId()."'";
            
            $result = mysqli_query($this->conn , $query);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function deletePosting($id){
        try{
            
            $query = "DELETE FROM `postings` WHERE id=$id";
            
            $result = mysqli_query($this->conn , $query);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getPostingsByName($name)
    {
        try
        {
            $postings = array();
            $stmt = "SELECT id, title, description, skills FROM postings WHERE title LIKE '%$name%'";
            
            $result = mysqli_query($this->conn , $stmt);
            while($row = $result->fetch_assoc()) {
                array_push($postings, new Posting($row['id'],$row['title'],$row['description'],$row['skills']));
            }
            return $postings;
          }
        catch (Exception $e)
        {
            
        }
    }
    
    //applying for a job
    public function apply(int $user_id, int $posting_id){
        try{
            $query = "INSERT INTO `applications`(`user_id`, `posting_id`) VALUES ($user_id,$posting_id)";
            
            $result = mysqli_query($this->conn , $query);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    //checking if applied
    public function check_applied($user_id,$posting_id){
        try{
            $query = "SELECT * from `applications` WHERE user_id=$user_id AND posting_id=$posting_id ";
            
            $result = mysqli_query($this->conn , $query);
            if(mysqli_num_rows($result) > 0){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function search_postings($search){
        try{
            //users array
            $postings = array();
            
            $query = "SELECT id, title, description, skills FROM postings WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR skills LIKE '%$search%'";
            
            $result = mysqli_query($this->conn , $query);
            while($row = $result->fetch_assoc()) {
                array_push($postings, new Posting($row['id'],$row['title'],$row['description'],$row['skills']));
            }
            return $postings;
          }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
?>