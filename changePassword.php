<?php
require_once('databaseController.php');

$db = new database();
$db_conn = $db->makeConnection();
// Validate reset token
$token = mysqli_real_escape_string($db_conn, $_GET['token']);
$query = "SELECT user_id FROM password_reset_tokens WHERE token = ? AND expire_time > NOW()";
$stmt = mysqli_prepare($db_conn, $query);
mysqli_stmt_bind_param($stmt, 's', $token);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) != 1) {
    $db->closeConnection($db_conn);
    die('Invalid reset token');
}
$user_id = mysqli_fetch_assoc($result)['user_id'];

# FIXME: remove the token from DB, make it invalid... 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="formsStyle.css">
    <title>User Login</title>
</head>
<body>
<div class="container mt-5 d-flex justify-content-center border p-4 rounded border-secondary" id="loginControl">
    <div class="col">
        <div class="text-center">
            <img class="mb-2 pr-4" src="https://i.imgur.com/WsbTtwa.png" alt="company's logo" width="310" height="75">
        </div>
        <div class="mt-3">
            <form id="form1" action="resetpassword.php" method="POST">
                <h2 class="mb-3">Choose a new password</h2>
                <p>Make sure your new password is 6 characters or more. Try including numbers, letters and punctuation marks.</p>
                <div class="form-group mt-4">
                    <input type="password" class="inputField form-control" id="pwd1" name="pwd1" placeholder="New password" required>
                </div>
                <div class="form-group mt-4">
                    <input type="password" class="inputField form-control" id="pwd2" name="pwd2" placeholder="Confirm new password" required>
                    <?php
                        // if (isset($_GET['message'])) {
                        //     $message = urldecode($_GET['message']);
                        //     echo "<p style='color:red'>$message</p>";
                        // }
                    ?>
                </div>
                <div class="row mt-4">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div class="col">
                        <input type="submit" class="mt-2 btn btn-dark" name="pwdsubmit" id="pwdsubmit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>