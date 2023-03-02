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
		/* td input[type=text] {
			width: 100%;
			border: none;
			background-color: transparent;
		} */
	</style>
</head>
<body>
	<!-- <div class="container"> -->
		<!-- <table class="table table-bordered">
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
	 -->

	 <!-- Example HTML code for a table with checkboxes -->
	 <table id="myTable">
  <thead>
    <tr>
      <th>Column 1</th>
      <th>Column 2</th>
      <th>Column 3</th>
	  <th><input type="checkbox"></th>
    </tr>
  </thead>
  <tbody>
    <tr id="checkAll">
      <td>Data 1.1</td>
      <td>Data 1.2</td>
      <td>Data 1.3</td>
	  <td><input type="checkbox" id="column1" name="column1"></td>
    </tr>
    <tr>
      <td>Data 2.1</td>
      <td>Data 2.2</td>
      <td>Data 2.3</td>
	  <td><input type="checkbox" id="column2" name="column2"></td>
    </tr>
    <tr>
      <td>Data 3.1</td>
      <td>Data 3.2</td>
      <td>Data 3.3</td>
    </tr>
  </tbody>
  <button type="submit" id="downloadButton">zip</button>

</table>
<script>

function downloadCSV() {
  // Get the selected columns
  const selectedColumns = [];
  const checkboxes = document.querySelectorAll('#myTable input[type="checkbox"]:checked');
  for (const checkbox of checkboxes) {
    if (checkbox.checked && checkbox.id !== 'checkAll') {
      selectedColumns.push(checkbox.parentNode.cellIndex + 1);
    }
  }

  console.log(selectedColumns);


// add the data to the CSV


// Generate the CSV file with selected rows and columns
let csv = '';

// add the headers to the CSV
const headerRow = document.querySelectorAll('#myTable th');
for (let i = 0; i < headerRow.length; i++) {
  if (selectedColumns.includes(i)) {
    csv += `${headerRow[i].textContent.trim()},`;
  }
}
csv = csv.slice(0, -1) + '\n';

// add the data to the CSV for selected rows
const tbody = document.querySelector('#myTable tbody');
const selectedRows = [];
for (const checkbox of checkboxes) {
  if (checkbox.checked && checkbox.id !== 'checkAll') {
    selectedRows.push(checkbox.parentNode.parentNode);
  }
}
for (const row of selectedRows) {
  if (row.cells.length > 0) {
    let rowData = '';
    for (let i = 0; i < row.cells.length; i++) {
      if (selectedColumns.includes(i)) {
        rowData += `${row.cells[i].textContent.trim()},`;
      }
    }
    csv += rowData.slice(0, -1) + '\n';
  }
}


console.log(csv);



  // Download the CSV file
  const downloadLink = document.createElement('a');
  downloadLink.href = `data:text/csv;charset=utf-8,${encodeURIComponent(csv)}`;
  downloadLink.download = 'table_data.csv';
  console.log(downloadLink.href);
  document.body.appendChild(downloadLink);
  downloadLink.click();
  document.body.removeChild(downloadLink);
}

const downloadButton = document.querySelector('#downloadButton');
downloadButton.addEventListener('click', downloadCSV);

//   function downloadCSV() {
//     const selectedColumns = [];
//     const checkboxes = document.querySelectorAll('#myTable input[type="checkbox"]');
//     for (const checkbox of checkboxes) {
//       if (checkbox.checked && checkbox.name !== 'checkAll') {
//         selectedColumns.push(checkbox.parentNode.parentNode.cellIndex);
//       }
//     }

//     const rows = document.querySelectorAll('#myTable tbody tr');
//     let csv = '';
//     for (const row of rows) {
//       for (let i = 0; i < row.cells.length; i++) {
//         if (selectedColumns.includes(i)) {
//           csv += `${row.cells[i].innerText},`;
//         }
//       }
//       csv = csv.slice(0, -1) + '\n';
//     }

//     const downloadLink = document.createElement('a');
//     downloadLink.href = `data:text/csv;charset=utf-8,${encodeURIComponent(csv)}`;
//     downloadLink.download = 'table_data.csv';
//     document.body.appendChild(downloadLink);
//     downloadLink.click();
//     document.body.removeChild(downloadLink);
//   }
</script>
</body>
</html>

