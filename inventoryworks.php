<?php
include "databaseController.php";
var_dump("hello");
$db = new database;
$conn = $db->makeConnection();

$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr><td hidden>" . $row["Inventory_ID"]. "</td><td hidden>" . $row["item_identification"]. "</td><td>" . $row["Brand"]. "</td><td>" . $row["Model"]. "</td><td>" . $row["Serial-number"]. "</td><td>" . $row["Responsible"]. "</td><td>" . $row["Local"]. "</td><td class='text-center'><input type='checkbox' class='form-check-input'></td></tr>";
  }
} else {
  echo "0 results";
}
$db->closeConnection($conn);
?>