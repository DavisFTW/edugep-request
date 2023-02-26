
<?php 
    include 'navigationBar.php';
    require_once("databaseController.php")
?>

<?php

$db = new database();
$mysqli = $db->makeConnection();

// Retrieve data from the database based on ID
$id = 1;
$query = "SELECT item_identification FROM Inventory WHERE Inventory_ID = $id";
$result = $mysqli->query($query);

// Check for errors
if (!$result) {
    echo "Failed to retrieve data from database: " . $mysqli->error;
    exit();
}

// Fetch the data
$data = $result->fetch_assoc();

// Pre-fill form fields with data
?>

<div class="container d-flex justify-content-center p-4 col-10 rounded mt-5" id="eqArea">                                                                                                            
    <div class="table-responsive">
        <form action="equipmentworks.php" method="post">
            <table class="table text text-light" id="table1">
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
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <form>
                                <input type="text" name="equipment" value="<?php echo $data['name']; ?>" class="form-control" id="myInput" required>
                                <select id="myDropdown" disabled style="visibility: hidden;"></select>
                            </form>
                        </td>
                        <td>
                            <input type="text" name="inventory-number" class="form-control" id="idnumber" required>
                        </td>
                        <td>
                            <input type="date" name="get-date" class="form-control" required>
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
                <?php
                $serverName = "localhost";
                $username = "root";
                $password = "";
                $databaseName = "edugep-data";  

                
                $conn = mysqli_connect($serverName, $username, $password, $databaseName);                    

                $result = mysqli_query($conn, "SELECT * FROM userRequests WHERE user_ID = $_SESSION[user_id] ORDER BY request_ID DESC LIMIT 10");
                
                while ($row = mysqli_fetch_array($result)) {

                switch ($row["status"]) {
                        case '1':
                            $dbStatus = "waiting for confirmation";
                        break;
                        case '2':
                            $dbStatus = "accepted";
                        break;
                        case '3':
                            $dbStatus = "declined";
                        break;
                    default:
                    $dbStatus = "ERROR";
                        break;
                }
                echo "<tr>";
                echo "<td>" . $row["Equipment_Name"] . "</td>";
                echo "<td>" . $row["Inventory_ID"] . "</td>";
                echo "<td>" . $row["requested_date_to_receive"] . "</td>";
                echo "<td>" . $row["return_date"] . "</td>";
                echo "<td>" . $dbStatus . "</td>";

                echo "</tr>";  
                }

                mysqli_close($conn);
                ?>
                </thead>
                <tbody>

                </tbody>
            </table>
        </form>
    </div> 
</div>
<script type = "text/javascript" src = "getOptions.js"></script>