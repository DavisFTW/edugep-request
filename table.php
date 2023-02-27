<!DOCTYPE html>
<html>
<head>
	<title>Print Selected Rows Example</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
	<script src="jsPDF/jspdf.min.js"></script>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Select</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>John Smith</td>
				<td>32</td>
				<td>Male</td>
				<td><input type="checkbox"></td>
			</tr>
			<tr>
				<td>Jane Doe</td>
				<td>27</td>
				<td>Female</td>
				<td><input type="checkbox"></td>
			</tr>
			<tr>
				<td>Bob Johnson</td>
				<td>45</td>
				<td>Male</td>
				<td><input type="checkbox"></td>
			</tr>
			<tr>
				<td>Sara Lee</td>
				<td>38</td>
				<td>Female</td>
				<td><input type="checkbox"></td>
			</tr>
		</tbody>
	</table>
	<button onclick="printPDF()">Print Selected Rows</button>

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
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
		  
		  doc.autoTable({ head: [['Name', 'Age', 'Gender']], body: data });
		  doc.output('dataurlnewwindow');
		}
	</script>
</body>
</html>

