<?php

require_once 'UserDataService.php';
require_once 'Person.php';

$u = new UserDataService();

echo "<pre>" . print_r($u->findByFirstName("Dude"), TRUE) . "</pre>";

echo "<pre>" . print_r($u->findByLastName("bro3"), TRUE) . "</pre>";

echo "<pre>" . print_r($u->findbyID(21), TRUE) . "</pre>";

if ($u->deleteItem(5)) {
    echo "Item 5 deleted<br>";
} else {
    echo "Failed to delete item 5";
}

echo "<hr>";


$newGuy = new Person(101, "Howard", "Hughes");

echo "<pre>" . print_r($u->findbyID(1), TRUE) . "</pre>";

$u->updateOne(1, $newGuy);

echo "<pre>" . print_r($u->findbyID(1), TRUE) . "</pre>";

?>