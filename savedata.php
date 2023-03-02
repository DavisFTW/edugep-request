<?php
include "databaseController.php";
$db = new database;
$conn = $db->makeConnection();
// Retrieve POST data
$id = $_POST['id'];
$field = $_POST['field'];
$value = $_POST['value'];

// Update database
$sql = "UPDATE Inventory SET $field='$value' WHERE Inventory_ID=$id";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
