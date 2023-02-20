<header class="d-flex">
        <nav class="nav1 shadow-sm navbar navbar-expand-lg navbar-light bg-light d-flex w-100">
            <img class="mt-2 pr-2 move-right" src="logo.png" alt="company's logo" width="240px" height="65px">
            <div class="navbar-collapse w-100 justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="link nav-link" href="#">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="link nav-link" href="#">Link 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="link nav-link" href="#">Link 3</a>
                    </li>
                </ul>
            </div>
                <div class="container text-end col-3">
                    <div class="col text-end">
                        Logged in as:
                        <?php
                        session_start();
                        echo $_SESSION['first_name'];
                        
                        if (!isset($_SESSION['user_id'])) {
                            // User is not signed in
                            header('Location: login.php');
                            exit;
                        }
                        ?>
                        <form action="equipmentworks.php" method="post">
                            <input type="submit" name="logoutfunc" value="sign out">
                        </form>
                    </div>
                    <div class="col m-2">
                
                    </div>
                </div>
        </nav>
    </header>