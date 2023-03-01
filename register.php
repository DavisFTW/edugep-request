<?php
session_start();
if($_SESSION['userrole'] != 1){  # user should not be here if he is not admin 
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"><link rel="stylesheet" href="mainpage.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="formsStyle.css">
  <title>User Registration</title>
</head>
<body>
  <div class="container mt-5 d-flex justify-content-center p-4 rounded" id="registrationControl">
    <div class="col">
      <div class="text-center">
        <img class="mb-4" src="https://i.imgur.com/WsbTtwa.png" alt="company's logo" width="300" height="75">
      </div>
      <div class="container">
        <div class="row">
          <div class="col col-sm-4">
            <a href="mainpage.php" class="link-secondary backbtn">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
              </svg>
               Go back
            </a>
          </div>
          <div class="col col-sm-12 mt-2 d-flex justify-content-center">
            <h2 class="text-center">User Registration</h2>
          </div>
        </div>
      <!-- </div> -->
      </div>
        <form action="DBWorks.php" method="POST">
          <div class="form-group row mt-4">
              <div class="col col-md-6" class="form-label">
                  <input type="text" class="form-control inputField" name="first_name" id="first_name" placeholder="First name" required>
              </div>
              <div class="col col-md-6" class="form-label">
                  <input type="text" class="form-control inputField" name="last_name" id="last_name" placeholder="Last name" required>
              </div>
          </div>
          <div class="form-group mt-4">
            <input type="email" class="form-control inputField" id="email" name="email" placeholder="E-mail" required>
            <?php
              if (isset($_GET['message'])) {
                $message = urldecode($_GET['message']);
                echo "<p style='color:red'>$message</p>";
              }
            ?>
          </div>
          <div class="form-group mt-4">
            <input type="password" class="form-control inputField" id="pwd" name="pwd" placeholder="Password" required>
          </div>
          <div class="form-group mt-4">
            <input type="password" class="form-control inputField" id="pwd2" name="pwd2" placeholder="Confirm password" required>
            <div id="errorDiv" ></div> 
          </div>
          <div class="row mt-4">
            <div class="col text-end">
                <button type="submit" class="mt-2 formButton" id="submit">Register</button>
            </div>
          </div>
        </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
   $(document).ready(function() {
      $("#pwd").blur(function() {
         if ($(this).val().length < 6) {
            alert("Password must be at least 6 characters long");
         }
      });
   });

   $(document).ready(function() {
      $("#submit").click(function(event) {
         if ($("#pwd").val().length < 6 || $("#pwd").val() !== $("#pwd2").val()) {
            event.preventDefault();
            $("#errorDiv").html("<p style='color:red'>Password must be at least 6 characters long and must be equal</p>");
         }
      });
   });
  </script>
</body>
</html>
