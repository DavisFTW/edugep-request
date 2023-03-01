<?php
include 'adminNavigationBar.php';
#FIXME 
?>

<div class="container d-flex justify-content-center p-4 col-10 rounded mt-5" id="eqArea">                                                                                                               
    <div class="table-responsive">
        <form action="equipmentworks.php" method="post">
            <table class="table text text-light">
                <thead>
                    <tr>
                    <th scope="col">
                        Inventory_ID
                    </th>
                    <th scope="col">
                        item_identification
                    </th>
                    <th scope="col">
                        Brand
                    </th>
                    <th scope="col">
                        Model
                    </th>
                    <th scope="col">
                        Serial-number
                    </th>
                    <th scope="col">
                        Responsible
                    </th>
                    <th scope="col">
                        Data de abate
                    </th>
                    <th scope="col">
                        Comments
                    </th>
                </tr>
                <?php
                $serverName = "localhost";
                $username = "root";
                $password = "";
                $databaseName = "edugep-data";  

                
                $conn = mysqli_connect($serverName, $username, $password, $databaseName);                    
                $result = mysqli_query($conn, "SELECT * FROM Inventory");


                while ($row = mysqli_fetch_array($result)) {
                $curr = $row["user_ID"];
                echo "<tr>";
                echo "<td>" . $row["Inventory_ID"] . "</td>";
                echo "<td>" . $row["item_identification"] . "</td>";
                echo "<td>" . $row["Brand"] . "</td>";
                echo "<td>" . $row["Model"] . "</td>";
                echo "<td>" . $row["Serial-number"] . "</td>";
                echo "<td>" . $row["Responsible"] . "</td>";
                echo "<td>" . $row["Data de abate"] . "</td>";
                echo "<td>" . $row["Comments"] . "</td>";


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

