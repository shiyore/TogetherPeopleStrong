<?php
/*
 * Project: TogetherPeopleStrong ver.7
 * @author: Carson Perry
 * Module: Users ver. 2, Affinities ver. 3
 * Date: 04/18/21
 * Synopsis: This is the Data Access Object for Users and Affinity Groups. This gets all users, specific users, all affinity groups, a single affinity group, as well as Create Update and Delete for Affinity groups,
 *          joining affinity groups, and updating user information.
 * References: This is referenced by the User Business Service, and references the usermodel, userdatamodel, and affinity model.
 */
namespace App\Services\Data;

use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;
use App\Models\AffinityModel;
use App\User;
use App\Models\UserDataModel;
use App\Models\UserModel;
use PDO;

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
                array_push($users, new UserDataModel($row['name'], $row['email']));
            }
            return $users;
        }
        catch (Exception $e)
        {
            
        }
    }
    
    public function getUser(int $id)
    {
        try
        {
            $user = array();
            
            $query = "SELECT * FROM users WHERE id=$id";
            
            $result = mysqli_query($this->conn , $query);
            while($row = $result->fetch_assoc()) {
                array_push($user, new UserDataModel($row['name'],$row['email']));
            }
            return $user;
        }
        catch (Exception $e)
        {
            
        }
    }
    
    public function getUserModel(int $id)
    {
        try
        {
            $user;
            
            $query = "SELECT * FROM users WHERE id=$id";
            
            $result = mysqli_query($this->conn , $query);
            while($row = $result->fetch_assoc()) {
                $user = new UserModel($row['name'],$row['email'], $row['password'], $row['ssn']);
            }
            return $user;
        }
        catch (Exception $e)
        {
            
        }
    }
    
    public function addSsn($name, $email, $ssn)
    {
        $uid = Auth::id();
        $query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `ssn` = '$ssn' WHERE `id` = $uid";
        mysqli_query($this->conn, $query);
    }
    
    public function getUsersFromAffinity(int $id)
    {
        try
        {
            $stmt = "SELECT * FROM users INNER JOIN affinity_tags ON affinity_tags.affinityID = $id AND affinity_tags.userID = users.id";
            $result = mysqli_query($this->conn, $stmt);
            $users = array();
            while($row = $result->fetch_assoc())
            {
                array_push($users, new UserDataModel($row['name'], $row['email']));
            }
            return $users;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
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
    
    public function getAffinity($id)
    {
        try
        {
            $stmt = "SELECT * FROM affinities WHERE id = $id";
            $aff;
            $result = mysqli_query($this->conn , $stmt);
            while($row = $result->fetch_assoc())
            {
                $aff = new AffinityModel((int)$row['ID'], $row['title'], $row['ownerID']);
            }
            return $aff;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function checkIfJoined($id, $uid)
    {
        try
        {
            $stmt = "SELECT * FROM affinity_tags WHERE affinityID = $id AND userID = $uid";
            $result = mysqli_query($this->conn, $stmt);
            if ($result->num_rows > 0)
                return true;
            else
                return false;
        }
        catch (Exception $e)
        {
            
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
                array_push($aff, (new AffinityModel($row['ID'], $row['title'], $row['ownerID'])));
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
    
    public function addThisAffinity(int $id, int $uid)
    {
        try
        {
            $stmt = "INSERT INTO affinity_tags (affinityID, userID) VALUES ($id, $uid)";
            $result = mysqli_query($this->conn, $stmt);
            return $result;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function removeThisAffinity(int $id, int $uid)
    {
        try
        {
            $stmt = "DELETE FROM affinity_tags WHERE affinityID = $id AND userID = $uid";
            $result = mysqli_query($this->conn, $stmt);
            return $result;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function createAffinity(string $title, int $uid)
    {
        //INSERT INTO `affinities` (`title`, `ownerID`) VALUES ('$title', $uid); SELECT LAST_INSERT_ID()
        try
        {
            $query = "INSERT INTO `affinities` (`title`, `ownerID`) VALUES ('$title', $uid)";
            $result = mysqli_query($this->conn , $query);
            $insertID = mysqli_insert_id($this->conn);
            
//             while($row = $result->fetch())
//             {
//                 $insertedID = $row['LAST_INSERT_ID()'];
//             }
            return $this->addThisAffinity($insertID, $uid);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function deleteAffinity($id)
    {
        try
        {
            
            $query = "DELETE `affinities`, `affinity_tags` FROM `affinities` INNER JOIN `affinity_tags` ON `affinities`.`ID` = `affinity_tags`.`affinityID` WHERE `affinities`.`ID` = $id";
            
            mysqli_query($this->conn , $query);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function updateAffinity($affinity)
    {
        try
        {
            $title = $affinity->getTitle();
            $query = "UPDATE `affinities` SET `title`='$title' WHERE `id`='".$affinity->getId()."'";
            
            $result = mysqli_query($this->conn , $query);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
}

