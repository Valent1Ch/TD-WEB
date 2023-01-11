<?php 

require 'functionconnect.php'

$db=connect('classicmodels');
$st=$db->query('select * from customers');
$allValues=$statement->fetchall(PDO::FETCH_ASSOC);


$fields=array_key(current($allValues));

echo "<table border='1'></thead>";
echo "<tr>";

foreach ($fields as $fields){
    echo "<th>$fields</th>";
}
echo "<tbody>";
foreach ($allValues as $row){
    echo "<tr>";
foreach ($row as $value){
        echo "<td>$value</td>";
    }
 echo "</tr>";
}
echo "</tbody>";
echo "</thead>";
echo "</table>";



