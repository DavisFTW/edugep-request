<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="formStyle.css">
    <title>User Login</title>
    <style>
.loginEmail {
    border: none;
    border-radius: 0;
    border-bottom: 1px solid #ced4da;
  }
.loginEmail:focus {
    border-color: #80bdff;
    box-shadow: none;
    outline: none;
  }

  .button-87 {
  margin: 10px;
  padding: 15px 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
  border-radius: 10px;
  display: block;
  border: 0px;
  font-weight: 700;
  box-shadow: 0px 0px 2px -7px #f09819;
  background-image: linear-gradient(45deg, #29235c 0%, white  11%, #29235c  100%);
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-87:hover {
  background-position: right center;
  /* change the direction of the change here */
  color: #fff;
  text-decoration: none;
}

.button-87:active {
  transform: scale(0.95);
}
    </style>
</head>
<body>
<div class="container mt-5 d-flex justify-content-center border p-4 rounded border-secondary" id="loginControl">
    <div class="col">
    <div class="text-center">
      <img class="mb-2 pr-4" src="https://i.imgur.com/WsbTtwa.png" alt="company's logo" width="310" height="75">
    </div>
        <h2 class="text-center">User Login</h2>
        <div class="mt-3">
            <form action="loginworks.php" method="post">
                <div class="form-group mt-5">
                    <!-- <label for="email">Email:</label> -->
                    <!-- <input type="email" class="form-control" id="email" name="email" required>-->
                    <input type="text" name="email" class="form-control loginEmail" placeholder="E-mail" required>
                </div>
                <div class="form-group mt-4">
                    <!-- <label for="pwd">Password:</label> -->
                    <input type="password" class="form-control loginEmail" id="pwd" placeholder="Password" name="pwd" required>
                    <?php
                        if (isset($_GET['message'])) {
                            $message = urldecode($_GET['message']);
                            echo "<p style='color:red'>$message</p>";
                        }
                    ?>
                </div>
                <div class="row mt-4">
                    <div class="col">
                      <input type="submit" class="mt-2 btn btn-dark" name="submit" value="Submit">
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
    <!-- HTML !-->
</div>
<button class="button-87" role="button">Button 87</button>

</body>
</html>