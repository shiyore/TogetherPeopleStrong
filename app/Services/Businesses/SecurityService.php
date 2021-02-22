<?php
namespace App\Services\Businesses;

use App\Models\AdminModel;
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
}
?>