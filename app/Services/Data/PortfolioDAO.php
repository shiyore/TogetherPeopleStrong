<?php
/*
 * Project: TogetherPeopleStrong ver.7
 * @author: Carson Perry
 * Module: Portfolios ver. 2
 * Date: 04/18/21
 * Synopsis: This is the Data Access Object for Portfolios. This gets all portfolios, check if a user has a portfolio already, and gets specific portfolio information based on certain information.
 * References: This is references the PortfolioBusiness Service.
 */
namespace App\Services\Data;
use App\Models\PortfolioModel;
use App\Models\UserModel;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\Auth;

class PortfolioDAO
{
    private $conn;
    
    public function __construct(DBConnect $db)
    {
        $this->conn = $db->get_conn();
        /*if ($this->conn->connect_error) {
            echo "Not connected, error: " . $this->conn->connect_error;
        }
        else {
            echo "Connected.";
        }*/
    }
    
    public function doesUserHavePortfolio(int $uid)
    {
        $query = "SELECT * FROM portfolios WHERE userID = $uid";
        
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
    }
    
    public function getPortfolioByUid(int $uid)
    {
        try
        {
            $query = "SELECT * FROM portfolios WHERE userID = $uid";
            $portfolio;
            $result = mysqli_query($this->conn , $query);
            while($row = $result->fetch_assoc())
            {
                $portfolio = new PortfolioModel($row['username'], $row['position'], $row['experience'], $row['proficiencies'], $row['bio']);
            }
            return $portfolio;
        }
        catch (Exception $e)
        {
            
        }
    }
    
    public function checkPortfolio(PortfolioModel $port)
    {
        try 
        {
            //echo "{$port->getName()}";
            $query = "SELECT * FROM portfolios WHERE username = '{$port->getName()}'";
            
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
        } 
        catch (Exception $e) 
        {
            echo $e->getMessage();
        }
    }
    
    public function updatePortfolio(PortfolioModel $port)
    {
        try
        {
            $id = Auth::id();
            $query = "UPDATE portfolios SET position = '{$port->getPosition()}', experience = '{$port->getExperience()}', proficiencies = '{$port->getProficiencies()}', bio = '{$port->getBio()}' WHERE userID = '{$id}'";
            if (mysqli_query($this->conn, $query))
            {
              return true;
            }
            else
            {
              return false;
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function createPortfolio(PortfolioModel $port)
    {
        try
        {
            $id = Auth::id();
            $query = "INSERT INTO `portfolios` (`username`, `position`, `experience`, `proficiencies`, `bio`, `userID`) VALUES ('{$port->getName()}', '{$port->getPosition()}', '{$port->getExperience()}', '{$port->getProficiencies()}', '{$port->getBio()}', '{$id}')";
            return mysqli_query($this->conn, $query);
            
//             if (mysqli_query($this->conn, $query))
//             {
//                 return true;
//             }
//             else
//             {
//                 return false;
//             }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function getAll()
    {
        try
        {
            $query = "SELECT * FROM portfolios";
            $portfolios = array();
                
            $result = mysqli_query($this->conn , $query);
            while($row = $result->fetch_assoc())
            {
                array_push($portfolios, new PortfolioModel($row['username'], $row['position'], $row['experience'], $row['proficiencies'], $row['bio']));
            }
            return $portfolios;
        }
        catch (Exception $e)
        {
            
        }
    }
    
    public function getPortfolioByName(String $name)
    {
        try
        {
            $query = "SELECT * FROM `portfolios` WHERE `username` = '$name'";
            $portfolio;
            $result = mysqli_query($this->conn , $query);
            while($row = $result->fetch_assoc())
            {
                $portfolio = new PortfolioModel($row['username'], $row['position'], $row['experience'], $row['proficiencies'], $row['bio']);
            }
            return $portfolio;
        }
        catch (Exception $e)
        {
            
        }
    }
}
?>