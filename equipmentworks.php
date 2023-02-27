<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['postdata'])) {
    $equipment = $_POST['equipment'];
    $inventory_num = $_POST['inventory-number'];
    $get_date = $_POST['get-date'];
    $ret_date = $_POST['return-date'];
    // process the data
    $date1 = (new DateTime($get_date))->format('Y-m-d');
    $date2 = (new DateTime($ret_date))->format('Y-m-d');
    makeRequest($date1, $date2, $equipment, $inventory_num);
    header('Location: mainpage.php');
}

if (isset($_POST['logoutfunc'])) {
    $_SESSION = array();

    session_destroy();

    header('Location: login.php');
    exit;
  }
  
function makeRequest($requested_date, $requested_return_date, $equipment, $inventory_num)
{
    $conn = makeConnection();

    $sql = "INSERT INTO userRequests (user_ID, Inventory_ID, requested_date_to_receive, return_date, status, equipment_Name) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    $waiting_status = 1;

    mysqli_stmt_bind_param($stmt, "iissis",  $_SESSION['user_id'], $inventory_num, $requested_date, $requested_return_date, $waiting_status, $equipment);

    mysqli_stmt_execute($stmt);
  
    mysqli_stmt_close($stmt);
    
    closeConnection($conn);
    include 'SendApproval.php';
}
function makeConnection(){
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "edugep-data";

    $conn = new mysqli($serverName, $username, $password, $databaseName);

    if($conn->connect_error){
        die("Connection to DB failed !" . $conn->connect_error);
    }
    return $conn;
}
function closeConnection($conn){
    $conn->close();
}