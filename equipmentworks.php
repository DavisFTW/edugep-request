<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipment = $_POST['equipment'];
    $inventory_num = $_POST['inventory-number'];
    $get_date = $_POST['get-date'];
    $ret_date = $_POST['return-date'];
    // process the data
    $date1 = (new DateTime($get_date))->format('Y-m-d');
    $date2 = (new DateTime($ret_date))->format('Y-m-d');
    makeRequest($date1, $date2, $equipment);    
}
function makeRequest($requested_date, $requested_return_date, $equip_id)
{
    $conn = makeConnection();

    $sql = "INSERT INTO userRequests (user_ID, equipment_ID, requested_date_to_receive, return_date) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "iiss",  $_SESSION['user_id'], $equip_id, $requested_date, $requested_return_date);

    mysqli_stmt_execute($stmt);
  
    mysqli_stmt_close($stmt);
    
    closeConnection($conn);

    #ADDME: call a function which sends an email, informing the admin on such and such requests.
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