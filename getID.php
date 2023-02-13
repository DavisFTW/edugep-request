<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect("localhost", "root", "", "edugep-data");
$inputValue = mysqli_real_escape_string($conn, $_GET['inputValue']);
$query = "SELECT * FROM inventory WHERE item_identification = '%$inputValue%'";
$result = mysqli_query($conn, $query);
$options = array();
while ($row = mysqli_fetch_assoc($result)) {
  $options[] = array("id" => $row['Inventory_ID'], "value" => $row['Inventory_ID']);
}
echo json_encode($options);

?>