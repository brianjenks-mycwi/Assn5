<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=mathinfo';
    private static $username = 'root';
    private static $password = '$hoe1Aces';
    private static $db;

    private function __construct() {}

    public static function getDB (&$error) {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                $error = "There was an issue with connecting to the Database.";
//                echo $error_message; //Tell us what happened
                include('error.php'); //Maybe add this later
                exit();
            }
        }
        unset($error); //Clear the error message if successful
        return self::$db;
    }
}

//Create an employee class, holds all employee data
class Employee {
    private $id;
    private $firstName, $lastName, $email;
    
    //Create our employee with this
    public function __construct($id, $firstName, $lastName,
                                $email) {
        $this->id =$id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }
    public function getID() { //Not sure we need the ID... prob shouldn't display it ever
        return $this->id;
    }                       //There is no set to ID, because it shouldn't be changed
    public function getFirstName() {
        return $this->firstName;
    }
    public function setFirstName($value) {
        $this->firstName = $value;
    }
    public function getLastName() {
        return $this->lastName;
    }
    public function setLastName($value) {
        $this->lastName = $value;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($value) {
        $this->email = $value;
    }
}

//This will access the DB and return an array
class EmployeeDB{
    public static function getEmployees(&$error) {
        try {
        $db = Database::getDB($error);
        $query = 'SELECT * FROM employee
                  ORDER BY empID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['empID'],
                                     $row['firstName'],
                                     $row['lastName'],
                                     $row['email']);
            $employees[] = $employee;
        }
        } catch (Exception $e) { //If connection does not happen...
            $error = "Error retrieving employees from Database." ;
            exit();
        }
        unset($error); //Clear the error message if successful
        return $employees;
    }
}
//Instantiate the array
//$employees = EmployeeDB::getEmployees(); //Not needed right now