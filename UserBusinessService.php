<?php

require_once 'UserDataService.php';

class UserBusinessService {
    
    function findByFirstName($n) {
        $persons = Array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByFirstName($n);
        
        return $persons;
    }
    
    function findByLastName($n) {
        $persons = Array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByLastName($n);
    }
    
    function findbyID($id) {
        $dbService = new UserDataService();
        $person = $dbService->findbyID($id);
    }
    
    function deleteItem($id) {
        $dbService = new UserDataService();
        
        return $dbService->deleteItem($id);
    }
    
    function updateOne($id, $person) {
        $dbService = new UserDataService();
        return $dbService->updateOne($id, $person);
    }
    
    function findByFirstNameWithAddress($n) {
        $persons = Array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByFirstNameWithAddress($n);
        
        return $persons;
    }
    
}
?>