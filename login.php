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
.formButton {
  appearance: none;
  background-color: #29235c;
  border: 2px solid #1A1A1A;
  border-radius: 15px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 16px;
  font-weight: 600;
  line-height: normal;
  margin: 0;
  /* min-height: 60px; */
  /* min-width: 0; */
  outline: none;
  /* padding: 16px 24px; */
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  /* width: 100%; */
  will-change: transform;
  height: 45px;
  width: 100px;
}

.formButton:disabled {
  pointer-events: none;
}

.formButton:hover {
  color: #fff;
  background-color: #29235c;
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  transform: translateY(-1px);
}

.formButton:active {
  box-shadow: none;
  transform: translateY(0);
}
    </style>
</head>
<body>
<div class="container mt-5 d-flex justify-content-center border p-4 rounded border-secondary" id="loginControl">
    <div class="col">
    <div class="text-center">
      <img class="mb-4 pr-4" src="https://i.imgur.com/WsbTtwa.png" alt="company's logo" width="310" height="75">
    </div>
        <h2 class="text-center">User Login</h2>
        <form action="loginworks.php" method="post">
            <div class="form-group mt-4">
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
            <div class="row mt-4 text-end">
                <div class="col">
                    <!-- <input type="submit" class="mt-2 btn btn-dark" name="submit" value="Submit"> -->
                    <button class="formButton" role="button" type="submit" name="submit" value="Submit">Log In</button>
                </div>
            </div>
        </form>
        <div class="col mt-3">
            Don't have an account? 
                <a href="register.php">
                    Sign up
                </a>
        </div>
    </div>
    <!-- HTML !-->
</div>

</body>
</html>