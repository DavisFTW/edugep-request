<?php

$conn = mysqli_connect("hostname", "username", "password", "database_name");

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 5;

$start = ($page - 1) * $per_page;

$total = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) as total FROM table_name"))['total'];

$result = mysqli_query($conn, "SELECT * FROM table_name LIMIT $start, $per_page");

echo '<table>';
echo '<tr><th>Column 1</th><th>Column 2</th><th>Column 3</th></tr>';
while ($row = mysqli_fetch_array($result)) {
  echo '<tr>';
  echo '<td>' . $row['column_1'] . '</td>';
  echo '<td>' . $row['column_2'] . '</td>';
  echo '<td>' . $row['column_3'] . '</td>';
  echo '</tr>';
}
echo '</table>';

$num_pages = ceil($total / $per_page);

echo '<div class="pagination">';
for ($i = 1; $i <= $num_pages; $i++) {
  echo '<a href="?page=' . $i . '"' . ($i == $page ? ' class="selected"' : '') . '>' . $i . '</a> ';
}
echo '</div>';

mysqli_close($conn);

?>
