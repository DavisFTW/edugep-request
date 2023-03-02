<table id="myTable">
  <thead>
    <tr>
      <th></th>
      <th>Column 1</th>
      <th>Column 2</th>
      <th>Column 3</th>
      <th><input type='checkbox' class='form-check-input'  onclick="toggleSelectAll()"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Row1</td>
      <td>Row1</td>
      <td>Row1</td>
      <td>Row1</td>
      <td><input type="checkbox" class='form-check-input' ></td>
    </tr>
    <tr>
      <td>Row 2</td>
      <td>Row 2</td>
      <td>Row 2</td>
      <td>Row 2</td>
      <td><input type="checkbox" class='form-check-input' ></td>
    </tr>
  </tbody>
</table>

<button onclick="toggleSelectAll()">Select All</button>
<button onclick="downloadTable()">Download CSV</button>

<script>
  var allSelected = false;
  
  function toggleSelectAll() {
    var checkboxes = document.querySelectorAll("#myTable tbody input[type=checkbox]");
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = !allSelected;
    }
    allSelected = !allSelected;
  }
  function downloadTable() {
    var table = document.getElementById("myTable");
    var rows = table.querySelectorAll("tbody tr");
    var csv = [];
    
    for (var i = 0; i < rows.length; i++) {
      var checkbox = rows[i].querySelector("input[type=checkbox]");
      if (checkbox.checked) {
        var row = [], cols = rows[i].querySelectorAll("td");
    
        for (var j = 0; j < cols.length; j++)
          row.push(cols[j].innerText);
          
        csv.push(row.join(","));
      }
    }

    var filename = "myTable.csv";
    var csvFile = new Blob(["\ufeff", csv.join("\n")], {type: "text/csv;charset=utf-8"});
    var downloadLink = document.createElement("a");
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.setAttribute("download", filename);
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
  }
</script>
