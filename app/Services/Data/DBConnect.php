<?php
/*
 * Project: TogetherPeopleStrong ver.1
 * @author: Aiden Yoshioka
 * Module: Data Access ver. 1
 * Date: 04/18/21
 * Synopsis: This is the service that creates a mysqli connection to the database.
 * References: This is referenced by every Business service we have, that sends this connection to their relevant DAO.
 */
namespace App\Services\Data;
use mysqli;
use Carbon\Exceptions\Exception;

class DBConnect{
    
    //connection string
    private $conn;
    private $servername;
    private $dbname;
    private $username;
    private $password;
    
    //empty constructor
    public function __construct(string $db_name){
        //initialize properties
        $this->servername = 'localhost';
        $this->dbname = $db_name;
        $this->username = 'root';
        $this->password = 'root';
        
        
    }
    
    //create a connection
    public function get_conn(){
        //oop way
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        //establish connection
        //$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if($this->conn->connect_error){
            echo "Failed to connect to database: " . $this->conn->connect_error;
        }
        return $this->conn;
    }
    
    //set autocommit
    public function setAutoCommit(bool $value){
        $this->conn->autocommit($value);
    }
    
    //close conn
    public function closeConn(){
        mysqli_close($this->conn);
    }
    
    //begin transaction
    public function beginTransaction(){
        $this->conn->begin_transaction();
    }
    //begin transaction
    public function commitTransaction(){
        $this->conn->commit();
    }
    //begin transaction
    public function rollbackTransaction(){
        $this->conn->rollback();
    }
}
?>