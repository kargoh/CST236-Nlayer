<?php

require_once 'Database.php';
require_once 'Person.php';

class UserDataService
{
    function findByFirstName($n) {
        // returns an array of persons
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, FIRST_NAME, LAST_NAME FROM USERS WHERE FIRST_NAME LIKE ?");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
         
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $person_array = array();
            
            while ($person = $result->fetch_assoc()) {
               array_push($person_array, $person);
            }
            
            return $person_array;
        }
    }
    
    function findByLastName($n) {
        // returns an array of persons
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, FIRST_NAME, LAST_NAME FROM USERS WHERE LAST_NAME LIKE ?");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $person_array = array();
            
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            
            return $person_array;
        }
    }
    
    function findbyID($id) {
        // returns an array of persons
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, FIRST_NAME, LAST_NAME FROM USERS WHERE ID = $id LIMIT 1");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $person_array = array();
            
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            
            return $person_array;
        }
    }
    
    function deleteItem($id) {
        // $id is the number to delete. returns a true or false;
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM USERS WHERE ID = $id LIMIT 1");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $stmt->bind_param("s", $id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function updateOne($id, $person) {
        // $id is the number to update. returns a true or false. $person is the item to change
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("UPDATE USERS SET FIRST_NAME = ?, LAST_NAME = ? WHERE ID = ? LIMIT 1");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $fn = $person->getFirst_name();
        $ln = $person->getLast_name();
        
        $stmt->bind_param("ssi", $fn, $ln, $id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function findByFirstNameWithAddress($n) {
        $db = new Database();
        
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, FIRST_NAME, LAST_NAME FROM USERS WHERE FIRST_NAME LIKE ?");
        
        if (!$stmt) {
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $person_array = array();
            $index = 0;
            
            while ($person = $result->fetch_assoc()) {
                $person_array[$index] = array($row["ID"], $row["FIRST_NAME"], $row["LAST_NAME"]);
                ++$index;
            }
            
            return $person_array;
        }
    }
}

?>