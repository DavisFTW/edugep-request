<?php
include 'adminNavigationBar.php';
// session_start();
if($_SESSION['userrole'] != 1){   # user should not be here if he is not admin 
    header('Location: mainpage.php');
}
?>

<div class="container d-flex justify-content-center p-4 col-10 rounded mt-5" id="eqArea">                                                                                                               
    <div class="table-responsive">
        <form action="equipmentworks.php" method="post">
            <table class="table text text-light">
                <thead>
                    <tr>
                    <th scope="col">
                        username
                    </th>
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
                $result = mysqli_query($conn, "SELECT * FROM userRequests WHERE status=1");


                while ($row = mysqli_fetch_array($result)) {
                $curr = $row["user_ID"];
                $result2 = mysqli_query($conn, "SELECT first_name FROM users where id=$curr");
                $rowt = mysqli_fetch_array($result2);
                echo "<tr>";
                echo "<td>" . $rowt["first_name"] . "</td>";
                echo "<td>" . $row["Equipment_Name"] . "</td>";
                echo "<td>" . $row["Inventory_ID"] . "</td>";
                echo "<td>" . $row["requested_date_to_receive"] . "</td>";
                echo "<td>" . $row["return_date"] . "</td>";
                echo '
                    <td>
                        <a href="equipmentworks2.php?id=' . $row['request_ID'] . '&action=accept">
                            <button type="button" class="btn btn-success accept-btn" id="reqButton">
                                <span class="fa fa-check"></span>
                            </button>
                        </a> 
                        <a href="equipmentworks2.php?id=' . $row['request_ID'] . '&action=decline">
                            <button type="button" class="btn btn-danger decline-btn">
                                <span class="fa fa-times"></span>
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

