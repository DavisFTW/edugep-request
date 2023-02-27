
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
function get_item_name($id) {
    $db = new database();
    $mysqli = $db->makeConnection();
    $item_name = "";
    $query = "SELECT item_identification FROM Inventory WHERE Inventory_ID = $id";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($item_name);
    $stmt->fetch();
    $stmt->close();
    return $item_name;
}
?>
<script src="jsPDF/jspdf.min.js"></script>
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
                                <input type="text" name="equipment"  class="form-control" id="myInput" required>
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
            <table class="table text text-light width">
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
                    <th scope="col">
                        Select
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
                echo "<td class='text-center'><input type='checkbox' class='form-check-input'></td>";
                echo "</tr>";  
                }

                mysqli_close($conn);
                ?>
                </thead>
                <tbody>

                </tbody>
            </table>
        </form>
        <div id="printPdfBtn" class="justify-content-end d-flex">
            <button onclick="printPDF()" class="formButton submitEq">Print Selected Rows</button>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script type = "text/javascript" src = "getOptions.js"></script>
<script type = "text/javascript" src = "getOptionsById.js"></script>

<script>
    function printPDF() {
        var doc = new jsPDF();
        var checkedRows = document.querySelectorAll("input[type=checkbox]:checked");
        var data = [];
        
        for (var i = 0; i < checkedRows.length; i++) {
        var row = checkedRows[i].parentNode.parentNode;
        var rowData = [];
        for (var j = 0; j < row.cells.length - 1; j++) {
            rowData.push(row.cells[j].textContent);
        }
        data.push(rowData);
        }
        
        doc.autoTable({ head: [['Equipment Name', 'Inventory ID', 'Check-out date', 'Date of return', 'Status']], body: data });
        doc.output('dataurlnewwindow');
    }
</script>


