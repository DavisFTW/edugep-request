<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="mainpageStyle.css">
<header class="d-flex">
  <nav class="nav1 p-3 shadow-sm navbar navbar-expand-lg navbar-light bg-light d-flex w-100">
    <div class="container d-flex justify-content-center">
      <img class="mt-2 pr-2 move-right" src="https://i.imgur.com/WsbTtwa.png" alt="company's logo" width="240px" height="65px">
    </div>
    <div class="container-fluid justify-content-center" id="navbarScroll">
      <ul class="navbar-nav justify-content-center">
        <li class="nav-item">
          <a class="link nav-link" href="mainpage.php">Equipment Renting</a>
        </li>
        <li class="nav-item">
          <a class="link nav-link" href="repairpage.php">Equipment Repairs</a>
        </li>
      </ul>
    </div>
    <div class="container text-end col-3">
      <div class="col text-end">
        Logged in as:
        <?php
          echo $_SESSION['first_name'];
          if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit;
          }
        ?>
        <form action="equipmentworks.php" method="post">
          <input type="submit" class="formButton signOut mt-2" name="logoutfunc" value="Sign out">
        </form>
      </div>
      <div class="col m-2">
          
      </div>
    </div>
  </nav>
</header>



