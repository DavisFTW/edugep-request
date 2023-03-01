
<?php
    require_once("databaseController.php"); 
    session_start();
    if($_SESSION['userrole'] == 1){
        include 'adminNavigationBar.php';
    }
    else{
        include 'NavigationBar.php';
    }
?>
<div class="container d-flex justify-content-center p-4 col-10 rounded mt-5" id="eqArea">                                                                                                            
    <div class="">
        <form action="repairpageworks.php" method="post">
            <table class="table-responsive table text text-light" id="table1">
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
                        <select id="myDropdown" disabled style="visibility: hidden;"></select>
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
    <div class="">
        <form action="equipmentworks.php" method="post">
            <table class="table-responsive table text text-light width">
                <thead>
                    <tr>
                    <th scope="col">
                        Equipment
                    </th>
                    <th scope="col">
                        Inventory number
                    </th>
                    <th scope="col">
                        Date
                    </th>
                    <th scope="col">
                        Description
                    </th>
                </tr>
                <?php
                $db = new database;
                
                $conn = $db->makeConnection();

                $result = mysqli_query($conn, "SELECT * FROM repair_requests");
                
                while ($row = mysqli_fetch_array($result)) {

                echo "<tr>";
                echo "<td>" . $row["item_identification"] . "</td>";
                echo "<td>" . $row["Inventory_ID"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo '
                    <td>
                        <a href="repairpageworks.php?id=' . $row['Inventory_ID'] . '&action=accept">
                            <button type="button" class="btn btn-success accept-btn" id="reqButton">
                                <span class="fa fa-check"></span>
                            </button>
                        </a> 
                    </td>';
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
<script type = "text/javascript" src = "getOptionsById.js"></script>
