<?php


?>

<table>
<thead>
<td>
ID
</td>
<td>
First Name

</td>
<td>
Last Name
</td>
</thead>
<?php
for ($x = 0; $x> count($persons); $x++) {
    echo print_r($persons);
    echo "<tr>";
    echo "<td>" . $persons[$x]['FIRST_NAME'] . "<td>";
    echo "<td>" . $persons[$x]['LAST_NAME'] . "<td>";
    echo "<td>" . $persons[$x]['ID'] . "<td>";
    echo "<tr>";
}

?>
</table>

