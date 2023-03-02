<?php

$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "edugep-data";

$conn = mysqli_connect($serverName, $username, $password, $databaseName);

$query = $_POST['query'];
$sql = "SELECT * FROM Inventory WHERE item_identification LIKE '%$query%'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $curr = $row["user_ID"];
    echo "<tr>";
    echo "<td>" . $row["Inventory_ID"] . "</td>";
    echo "<td><input type='text' value='" . $row["item_identification"] . "' class='edit-input' name='item_identification'></td>";
    echo "<td><input type='text' value='" . $row["Brand"] . "' class='edit-input' name='Brand'></td>";
    echo "<td><input type='text' value='" . $row["Model"] . "' class='edit-input' name='Model'></td>";
    echo "<td><input type='text' value='" . $row["Serial-number"] . "' class='edit-input' name='Serial-number'></td>";
    echo "<td><input type='text' value='" . $row["Responsible"] . "' class='edit-input' name='Responsible'></td>";
    echo "<td><input type='text' value='" . $row["Data de abate"] . "' class='edit-input' name='Data de abate'></td>";
    echo "<td><input type='text' value='" . $row["Comments"] . "' class='edit-input' name='Comments'></td>";
    echo "</tr>";
}

mysqli_close($conn);

?>
