<?php
namespace App\Services\Data;
use App\Models\PortfolioModel;
use App\Models\UserModel;
use Carbon\Exceptions\Exception;

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
            $query = "UPDATE portfolios SET position = '{$port->getPosition()}', experience = '{$port->getExperience()}', proficiencies = '{$port->getProficiencies()}' WHERE username = '{$port->getName()}'";
            if ($result = mysqli_query($this->conn, $query))
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
            $query = "INSERT INTO `portfolios` (`portfolioID`, `username`, `position`, `experience`, `proficiencies`) VALUES (NULL, '{$port->getName()}', '{$port->getPosition()}', '{$port->getExperience()}', '{$port->getProficiencies()}')";
                      
            if ($result = mysqli_query($this->conn, $query))
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
}
?>