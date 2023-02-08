<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"><link rel="stylesheet" href="mainpage.css">
<div class="" id="mainPage">
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
                <div class="col-sm-6 text-end">
                    Logged in as: 
                    <?php
                    ?>
                </div>
            </div>
        </nav>
    </header>
</div>
<div class="container d-flex justify-content-center p-4 col-10 rounded mt-5" id="eqArea">
    <!-- <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Equipment" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-dark" type="button">Add</button>
        </div>
    </div> -->                                                                                                                  
    <div class="table-responsive">
        <form action="equipmentworks.php" method="post">
            <table class="table text text-light">
                <thead>
                    <tr>
                    <th scope="col">
                        Equipment
                    </th>
                    <th scope="col">
                        Inventory number
                    </th>
                    <th scope="col">
                        Check-out date
                    </th>
                    <th scope="col">
                        Date of return
                    </th>
                    <th scope="col">
                        Status
                    </th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="equipment"class="form-control">
                        </td>
                        <td>
                            <input type="text" name="inventory-number" class="form-control">
                        </td>
                        <td>
                            <input type="date" name="get-date" class="form-control">
                        </td>
                        <td>
                            <input type="date" name="get-date" class="form-control">
                        </td>
                        <td>
                        <button type="button" class="btn btn-success accept-btn" id="reqButton">
                            <span class="fa fa-check"></span>
                        </button>
                        <button type="button" class="btn btn-danger decline-btn">
                            <span class="fa fa-times"></span>
                        </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col text-end">
                <button type="submit" class="mt-2 btn btn-dark">Submit</button>
            </div>
        </form>
    </div> 
</div>
