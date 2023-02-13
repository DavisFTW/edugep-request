<?php

$request_ID = $_GET['id'];
$action = $_GET['action'];
# 1 -> waiting for confirmation 2 -> accepted 3-> declined
if ($action == 'accept') {
  $DB = makeConnection();
  $sql = "UPDATE userRequests SET status='2'  WHERE request_ID=$request_ID";
 
  $DB->query($sql);
  closeConnection($DB);

  header('Location: adminMainpage.php');
}
else if($action == 'decline'){
  $DB = makeConnection();
  $sql = "UPDATE userRequests SET status='3' WHERE request_ID=$request_ID";

  $DB->query($sql);
  closeConnection($DB);
  header('Location: adminMainpage.php');
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