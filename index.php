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
      <h2 class="text-center">User Registration</h2>
      <div class="mt-3">
        <form action="#">
          <div class="form-group row mt-2">
              <div class="col col-md-6" class="form-label">
                  <label class="form-label" for="first_name">First Name:</label>
                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name" required>
              </div>
              <div class="col col-md-6" class="form-label">
                  <label class="form-label" for="last_name">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name" required>
              </div>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" required>
          </div>
          <div class="form-group">
            <label for="pwd2">Confirm Password:</label>
            <input type="password" class="form-control" id="pwd2" placeholder="Confirm password" required>
          </div>
          <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
