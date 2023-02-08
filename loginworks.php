<?php

session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $conn = makeConnection();

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if (password_verify($_POST['pwd'], $row['pwd'])) {
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        header('Location: mainpage.php');

    } else {
        header("Location: login.php?message=".urlencode("Incorrect username or password. Please try again."));
        exit;
    }
    mysqli_stmt_close($stmt);
    $conn->close();
} else {
    header('Location: login.php');
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
?>