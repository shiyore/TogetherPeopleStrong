<?php
namespace App\Services\Data;

use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;
use App\Models\AffinityModel;
use App\User;
use App\Models\UserDataModel;

class UserDAO
{
    private $conn;
    public function __construct(DBConnect $conn)
    {
        $this->conn = $conn->get_conn();
    }
    
    public function getAllUsers()
    {
        try
        {
            $stmt = "SELECT * FROM users";
            $result = mysqli_query($this->conn, $stmt);
            $users = array();
            while($row = $result->fetch_assoc())
            {
                array_push($users, new UserDataModel($username, $email, $password));
            }
        }
        catch (Exception $e)
        {
            
        }
    }
    
    public function checkAffinity(string $key)
    {
        try
        {
            $stmt = "SELECT title FROM affinities WHERE title Like '%$key%'";
            $aff = array();
            $result = mysqli_query($this->conn , $stmt);
            while($row = $result->fetch_assoc())
            {
                array_push($aff, ($row['title']));
            }
            return $aff;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function getAllAffinities()
    {
        try
        {
            $stmt = "SELECT * FROM affinities";
            $aff = array();
            $result = mysqli_query($this->conn, $stmt);
            while($row = $result->fetch_assoc())
            {
                array_push($aff, (new AffinityModel($row['id'], $row['title'])));
            }
            return $aff;
        }
        catch (Exception $e)
        {
            
        }
    }
    
    public function getAffinityId(string $key)
    {
        $stmt = "SELECT ID from affinities WHERE title = $key";
        $result = mysqli_query($this->conn, $stmt);
        $result->bind_result($id);
        while ($result->fetch())
        {
            return $id;
        }
    }
    
    public function addThisAffinity(string $key, int $uid)
    {
        try
        {
            $affIdStmt = "SELECT ID from affinities WHERE title = $key";
            $result = mysqli_query($this->conn, $affIdStmt);
            $affId = getAffinityId($key);
            $stmt = "INSERT INTO affinity_tags (affinityID, userID) VALUES ($affId, $uid)";
            $result = mysqli_query($this->conn, $stmt);
            if ($result->num_rows() > 0)
                return true;
            else
                return false;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function getAffinityUsers(int $id)
    {
        try
        {
            $stmt = "SELECT name FROM users INNER JOIN affinity_tags ON affinity_tags.affinityID = $id AND affinity_tags.userID = users.id";
            $result = mysqli_query($this->conn, $stmt);
            while($row = $result->fetch_assoc())
            {
                array_push($users, $row['name']);
            }
        }
        catch (Exception $e)
        {
            
        }
    }
}

