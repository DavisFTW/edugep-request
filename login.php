<<<<<<< HEAD
<?php
include 'DBWorks.php';

?>

=======
>>>>>>> 77291383d13d3da8e134d4acb86812ad954bbca4
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>User Login</title>
</head>
<body>
<div class="container mt-5 d-flex justify-content-center border p-4 rounded border-secondary" id="loginControl">
    <div class="col">
    <div class="text-center">
      <img class="mb-2 pr-2" src="logo.png" alt="company's logo" width="300" height="75">
    </div>
        <h2 class="text-center">User Login</h2>
        <div class="mt-3">
            <form>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="mt-2 btn btn-dark">Submit</button>
                    </div>
                    <div class="col col-md-4 offset-md-3">
                        <a href="register.php">
                            <button type="button" class="mt-2 btn btn-secondary">Register</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
