<!DOCTYPE html>
<html>
<head>
	<title>Editable Table using Bootstrap 5</title>
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
				<tr>
					<td><input type="text" value="John" class="edit-input"></td>
					<td><input type="text" value="Doe" class="edit-input"></td>
					<td><input type="text" value="john@example.com" class="edit-input"></td>
				</tr>
				<tr>
					<td><input type="text" value="Jane" class="edit-input"></td>
					<td><input type="text" value="Doe" class="edit-input"></td>
					<td><input type="text" value="jane@example.com" class="edit-input"></td>
				</tr>
			</tbody>
		</table>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		// Editable fields
		const editInputs = document.querySelectorAll('.edit-input');
		editInputs.forEach(function(input) {
			input.addEventListener('click', function() {
				input.removeAttribute('readonly');
			});
			input.addEventListener('blur', function() {
				input.setAttribute('readonly', true);
			});
		});
	</script>
</body>
</html>
