<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="mainpageStyle.css">
    <header class="d-flex">
        <nav class="nav1 p-3 shadow-sm navbar navbar-expand-lg navbar-light bg-light d-flex w-100">
            <img class="mt-2 pr-2 move-right" src="https://i.imgur.com/WsbTtwa.png" alt="company's logo" width="240px" height="65px">
            <div class="navbar-collapse w-100 justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="link nav-link" href="adminmainpage.php">Admin Page</a>
                    </li>
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
                        session_start();
                        if (!isset($_SESSION['user_id'])) {
                            // User is not signed in
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
