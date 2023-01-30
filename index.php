<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>User Registration</title>
</head>
<body>
  <div class="container mt-5 d-flex justify-content-center">
    <div class="col-4">
      <h2 class="text-center">User Registration</h2>
      <div class="mt-3">
        <form method="POST" action="#">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password">
          </div>
          <div class="form-group">
            <label for="pwd2">Confirm Password:</label>
            <input type="password" class="form-control" id="pwd2" placeholder="Confirm password">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
