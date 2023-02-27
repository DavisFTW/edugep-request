<?php
include "databaseController.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new database;

$request_ID = $_GET['id'];
$action = $_GET['action'];

if ($action == 'accept') {
  $conn = $db->makeConnection();
  $sql = "DELETE FROM repair_requests WHERE Inventory_ID = $request_ID";
 
  $conn->query($sql);
  $db->closeConnection($conn);

  header('Location: repairPage.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $equipmentId = $_POST["inventory-number"];
  $equipmentName = $_POST["equipment"];
  $description = $_POST["description"];
  $date = $_POST["return-date"];
  
  $conn = $db->makeConnection();

  $sql = "INSERT INTO repair_requests (item_identification, inventory_ID, date, description) VALUES (?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "siss", $equipmentName, $equipmentId, $date, $description);

    mysqli_stmt_execute($stmt);
  
    mysqli_stmt_close($stmt);
    
    $db->closeConnection($conn);
  
    header('Location: repairPage.php');
}

?>