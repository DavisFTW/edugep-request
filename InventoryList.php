
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
<title>Inventory</title>
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
    <div class="table-responsive">
    <div class="input-group rounded w-50 mb-3">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button id="search-button" type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>
        <form action="equipmentworks.php" method="post">
            <table class="table text text-light width">
                <thead>
                    <tr>
                    <th scope="col" hidden>
                        First name
                    </th>
                    <th scope="col" hidden>
                        Last name
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
                </thead>
                <tbody>

                </tbody>
            </table>
        </form>
    </div>
</div>




