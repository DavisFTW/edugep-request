<?php
include "databaseController.php";
var_dump("hello");
$db = new database;
$conn = $db->makeConnection();

$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td hidden>" . $row["Inventory_ID"]. "</td><td hidden>" . $row["item_identification"]. "</td><td>" . $row["Brand"]. "</td><td>" . $row["Model"]. "</td><td>" . $row["Serial-number"]. "</td><td>" . $row["Responsible"]. "</td><td>" . $row["Local"]. "</td></tr>";
  }
} else {
  echo "0 results";
}
$db->closeConnection($conn);
?>