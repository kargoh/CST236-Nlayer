<?php

require_once 'autoloader.php';

for($x = 0; $x < count($users); $x++) {
    echo "<tr>";
    echo "<td>" . $users[$x][0] . "</td>" . "<td>" . $users[$x][1] . "</td>" . "</td>" . "<td>" . $users[$x][2] . "</td>";
    echo "</tr>";
}