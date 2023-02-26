<?php
include_once("databaseController.php");

$id = $_GET["id"];

$db = new database();
$mysqli = $db->makeConnection();
$item_name = "";

// Prepare a SELECT statement to retrieve the item name for the given ID
$query = "SELECT item_identification FROM Inventory WHERE Inventory_ID = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);

// Execute the statement and get the result
$stmt->execute();
$stmt->bind_result($item_name);
$stmt->fetch();

// Close the statement and connection
$stmt->close();
$mysqli->close();

// Return the retrieved item name
echo $item_name;
?>
