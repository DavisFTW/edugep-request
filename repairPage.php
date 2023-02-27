
<?php 
    session_start();
    if($_SESSION['userrole'] == 1){
        include 'adminNavigationBar.php';
    }
    else{
        include 'NavigationBar.php';
    }
    require_once("databaseController.php")
?>

<?php

// $db = new database();
// $mysqli = $db->makeConnection();

// // Retrieve data from the database based on ID
// $id = 1;
// $query = "SELECT item_identification FROM Inventory WHERE Inventory_ID = $id";
// $result = $mysqli->query($query);

// // Check for errors
// if (!$result) {
//     echo "Failed to retrieve data from database: " . $mysqli->error;
//     exit();
// }

// // Fetch the data
// $data = $result->fetch_assoc();

// Pre-fill form fields with data
?>

<div class="container d-flex justify-content-center p-4 col-10 rounded mt-5" id="eqArea">                                                                                                            
    <div class="table-responsive">
        <form action="equipmentworks.php" method="post">
            <table class="table text text-light" id="table1">
                <thead>
                    <tr>
                    <th scope="col">
                        Equipment ID
                    </th>
                    <th scope="col">
                        Equipment name
                    </th>
                    <th scope="col">
                        Description
                    </th>
                    <th scope="col">
                        Date
                    </th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                    </td>
                        <td>
                            <input type="text" name="inventory-number" class="form-control" id="idnumber" required>
                        </td>
                        <td>
                        <input type="text" name="equipment" value="" class="form-control" id="myInput" required>
                            <!-- <form>
                                <input type="text" name="equipment" value=
                                "
                                    <?php
                                        // echo $data['name']; 
                                    ?>
                                "
                                 class="form-control" id="myInput" required>
                                <select id="myDropdown" disabled style="visibility: hidden;"></select>
                            </form> -->
                        <td>
                            <input type="text"  name="description" class="form-control" required>
                        </td>
                        <td>
                             <input type="date" name="return-date" class="form-control" required>
                        </td>
                        <td>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col text-end">
                <button type="submit" name="postdata" class="mt-2 formButton submitEq">Submit</button>
            </div>
        </form>
    </div> 
</div>

<div class="container d-flex justify-content-center p-4 col-10 rounded mt-5" id="eqArea">                                                                                                                
    <div class="table-responsive">
        <form action="equipmentworks.php" method="post">
            <table class="table text text-light">
                <thead>
                    <tr>
                    <th scope="col">
                        Equipment ID
                    </th>
                    <th scope="col">
                        Equipment name
                    </th>
                    <th scope="col">
                        Check-out date
                    </th>
                    <th scope="col">
                        Date
                    </th>
                </tr>
                <tbody>
                </tbody>
            </table>
        </form>
    </div> 
</div>
<!-- <script type = "text/javascript" src = "getOptions.js"></script> -->