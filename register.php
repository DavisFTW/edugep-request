<?php
  include 'DBWorks.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  <title>User Registration</title>
</head>
<body>
  <div class="container mt-5 d-flex justify-content-center p-4 rounded" id="registrationControl">
    <div class="col">
      <div class="text-center">
      <img class="mb-2" src="logo.png" alt="company's logo" width="300" height="75">
      </div>
      <h2 class="text-center">User Registration</h2>
      <div class="mt-3">
        <form action="DBWorks.php" method="post">
          <div class="form-group row mt-2">
              <div class="col col-md-6" class="form-label">
                  <label class="form-label" for="first_name">First Name:</label>
                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter your first name" required>
              </div>
              <div class="col col-md-6" class="form-label">
                  <label class="form-label" for="last_name">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter your last name" required>
              </div>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" required>
          </div>
          <div class="form-group">
            <label for="pwd2">Confirm Password:</label>
            <input type="password" class="form-control" id="pwd2" placeholder="Confirm password" required>
          </div>
          <div class="row">
            <div class="col">
                <button type="submit" class="mt-2 btn btn-dark">Submit</button>
            </div>
            <div class="col col-md-3 offset-md-3">
                <a href="login.php">
                  <button type="button" class="mt-2 btn btn-secondary">Login</button>
                </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>