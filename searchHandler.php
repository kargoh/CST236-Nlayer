<?php

require_once 'UserBusinessService.php';

$searchPhrase = $_GET['name'];

$bs = new UserBusinessService();

$persons = $bs->findByFirstName($searchPhrase);


?>
<h2>Search Results</h2>
<p>Here is what we found</p>

<?php 
if ($persons) {
    include('_displaySearchResults.php');
} else {
    echo "Nobody found here like that<br>";
}






?>