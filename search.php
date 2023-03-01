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
