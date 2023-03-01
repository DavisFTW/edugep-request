<?php
include 'adminNavigationBar.php';
#FIXME 
?>

<div class="container d-flex justify-content-center p-4 col-10 rounded mt-5" id="eqArea">                                                                                                          
    <div class="table-responsive" style="height: 300px">
    <div class="input-group rounded w-50 mb-2">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button id="search-button" type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>     
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
                        Data de abate
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

