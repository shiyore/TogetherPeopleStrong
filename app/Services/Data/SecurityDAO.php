<?php
namespace App\Services\Data;
use App\Models\AdminModel;
use App\Models\UserModel;
use Carbon\Exceptions\Exception;

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
            
            $query = "SELECT name , email, password from users";
            
            $result = mysqli_query($this->conn , $query);
            while($row = $result->fetch_assoc()) {
                array_push($users, new UserModel($row['name'],$row['email'],$row['password']));
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
}
?>