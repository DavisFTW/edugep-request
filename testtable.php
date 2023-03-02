<!DOCTYPE html>
<html>
<head>
	<title>Editable Table using Bootstrap 5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- Latest compiled and minified CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> -->
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
	<i class="bi bi-pencil"></i>


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

