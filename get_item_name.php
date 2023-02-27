<?php
include_once("databaseController.php");

$id = $_GET["id"];

$db = new database();
$mysqli = $db->makeConnection();
$item_name = "";

$query = "SELECT item_identification FROM Inventory WHERE Inventory_ID = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);

$stmt->execute();
$stmt->bind_result($item_name);
$stmt->fetch();

$stmt->close();
$mysqli->close();

echo $item_name;
?>
