<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"><link rel="stylesheet" href="mainpage.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"><link rel="stylesheet" href="mainpage.css">
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
        <form action="#">
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
          <div class="form-group mt-2">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
          </div>
          <div class="form-group mt-2">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" required>
          </div>
          <div class="form-group mt-2">
            <label for="pwd2">Confirm Password:</label>
            <input type="password" class="form-control" id="pwd2" placeholder="Confirm password" required>
          </div>
          <div class="row mt-2">
            <div class="col">
                <button type="submit" class="mt-2 btn btn-dark">Submit</button>
            </div>
            <div class="col col-md-3 offset-md-3 ">
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