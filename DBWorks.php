<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    
    if ($_POST['pwd'] == $_POST['pwd2']) {
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        registerUser($first_name, $last_name, $email, $pwd);
        header('Location: login.php');
    } else {
        header('Location: register_failed.php');
    }
}


function verifyEmail($email){
    $conn = makeConnection();

    $query = "SELECT * FROM users WHERE email = '$email'";

    $res = $conn->query($query);

    if($res){
        if (mysqli_num_rows($res) > 0) {
            closeConnection($conn);
            return true;
        } else {
            closeConnection($conn);
            return false;
        }
    }
}

function makeConnection(){
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "edugep_data";

    $conn = new mysqli($serverName, $username, $password, $databaseName);

    if($conn->connect_error){
        die("Connection to DB failed !" . $conn->connect_error);
    }
    return $conn;
}
function closeConnection($conn){
    $conn->close();
}

function insertRequestData($equipment, $date, $returnDate){
    $conn = makeConnection();

    // insert the data
    closeConnection($conn);
}

function registerUser($first_name, $last_name, $email, $password)
{
    $conn = makeConnection();

    $sql = "INSERT INTO users (first_name, last_name, email, pwd) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $password);

    mysqli_stmt_execute($stmt);
  
    mysqli_stmt_close($stmt);
    
    closeConnection($conn);
}