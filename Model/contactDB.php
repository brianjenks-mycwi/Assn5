<?php

class Contact{
    private $id, $firstName, $lastName, $email, $phone,
            $reason, $date, $assnEmp, $data; //Instantiate all variables
    
    //Create our contact with this
    public function __construct($id, $firstName, $lastName,
                                $email, $phone, $reason,
                                $date, $emp, $data) {
        $this->id =$id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->reason = $reason;
        $this->date = $date;
        $this->assnEmp = $emp;
        $this->data = $data;
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
    public function getPhone() {
        return $this->phone;
    }
    public function setPhone($value) {
        $this->phone = $value;
    }
    public function getReason() {
        return $this->reason;
    }
    public function setReason($value) {
        $this->reason = $value;
    }
    public function getDate() { //Date should never be set manually
        return $this->date;
    }
    public function getAssnEmp() {
        return $this->assnEmp;
    }
    public function setAssnEmp($value) {
        $this->assnEmp = $value;
    }
    public function getData() { //Data should never be changed
        return $this->data;
    }
    
    //Adding a function to tell us the different reasons they contacted
    public function displayReason() {
        switch ($this->reason) { //Reasons should only hold an int 0-4
            case 0:
                return "Invalid";
            case 1:
                return "Recommend";
            case 2:
                return "Criticism";
            case 3:
                return "Question";
            case 4:
                return "Other";
        }
    }// end displayReason()
} //End Contact

//Our connection with the DB
class ContactDB{
    //This function will pull all of our contacts
    public static function getContacts(&$error) {
        try {
            $db = Database::getDB($error);
            $query = 'SELECT * FROM contact
                      ORDER BY contactID';
            $statement = $db->prepare($query);
            $statement->execute();
            //Create an array to store a contact in
            $contact = array();
            foreach ($statement as $row) {
                $contact = new Contact($row['contactID'],
                                         $row['firstName'],
                                         $row['lastName'],
                                         $row['contactEmail'],
                                         $row['phone'],
                                         $row['contactReason'],
                                         $row['dateContacted'],
                                         $row['assignedEmpID'],
                                         $row['contactData']);
                $contacts[] = $contact; //Put the contact at the end of this array
            }
        } catch (Exception $e) { //If we fail to connect
            $error = "Error retrieving contacts from Database." ;
            exit();
        }
        unset($error); //Clear the error message if successful
        return $contacts; //Return our array of arrays
    }
    
    public function createContact($fName, $lName, $email, $phone, $reason,
            $time, $msg, &$error) {
        try {
            $db = Database::getDB($error); //Return our database stuff
            // Add the product to the database  
            $query = 'INSERT INTO contact
                         (firstName, lastName, contactEmail, phone,
                         contactReason, assignedEmpID, dateContacted,
                         contactData)
                      VALUES
                         (:fName, :lName, :email, :phone, :reason, 1, :time, :msg)';
            //Assigned Emp will always be the webmaster at first!
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':phone', $phone);
            $statement->bindValue(':reason', $reason);
            $statement->bindValue(':time', $time);
            $statement->bindValue(':msg', $msg);
            $statement->execute();
            $statement->closeCursor();
        } catch (Exception $e) {
            $error = "Error retrieving contacts from Database." ;
            exit();
        }
        unset($error); //Clear the error message if successful
    }
    
    //This function will delete the contact from the DB
    public static function deleteContact($contactID, &$error) {
        try {
            $db = Database::getDB($error); 
            $query = 'DELETE FROM contact
                      WHERE contactID = :contactID';
            $statement = $db->prepare($query);
            $statement->bindValue(':contactID', $contactID);
            $statement->execute();
            $statement->closeCursor();
        } catch (Exception $e) {
            $error = "Error retrieving employees from Database." ;
            exit();
        }
        unset($error); //Clear the error message if successful
    }
}

class NewsletterDB {
    public static function createNews(&$error) {
        try {
            $db = Database::getDB($error); //Return our database stuff
            // Add the product to the database  
            $query = 'INSERT INTO newsletter
                         (email, dateSigned, subscribed)
                      VALUES
                         (:email, :time , 1)';
            //Assigned Emp will always be the webmaster at first!
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':time', $time);
            $statement->execute();
            $statement->closeCursor();
        } catch (Exception $e) { //Break out if needed
            $error = "There was an error creating a news contact.";
            exit();
        }
        unset($error);
    }
}
