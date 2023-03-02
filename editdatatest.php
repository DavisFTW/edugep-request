<!DOCTYPE html>
<html>
<head>
	<title>Editable Table using Bootstrap 5 with Database</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<style>
		td input[type=text] {
			width: 100%;
			border: none;
			background-color: transparent;
		}
	</style>
</head>
<body>
	<div class="container">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// Connect to database
					$conn = mysqli_connect('localhost', 'root', '', 'edugep-data');

					// Check connection
					if (mysqli_connect_errno()) {
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						exit();
					}

					// Retrieve data from database
					$sql = "SELECT * FROM example_table";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td><input type='text' value='" . $row['name'] . "' class='edit-input' data-id='" . $row['id'] . "' data-field='firstname'></td>";
							echo "<td><input type='text' value='" . $row['phone'] . "' class='edit-input' data-id='" . $row['id'] . "' data-field='lastname'></td>";
							echo "<td><input type='text' value='" . $row['email'] . "' class='edit-input' data-id='" . $row['id'] . "' data-field='email'></td>";
							echo "</tr>";
						}
					}

					// Close connection
					mysqli_close($conn);
				?>
			</tbody>
		</table>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		// Editable fields
		const editInputs = document.querySelectorAll('.edit-input');
		editInputs.forEach(function(input) {
			input.addEventListener('click', function() {
				input.removeAttribute('readonly');
			});
			input.addEventListener('blur', function() {
				input.setAttribute('readonly', true);
				saveData(input.dataset.id, input.dataset.field, input.value);
			});
		});

		// Save data to database
// Save data to database
function saveData(id, field, value) {
    // Send data to server-side script (e.g., PHP, Python, Ruby, etc.) via AJAX
    // Example using jQuery:
    $.ajax({
        url: 'savedata.php',
        method: 'POST',
        data: {
            id: id,
            field: field,
            value: value
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

	</script>
</body>
</html>
