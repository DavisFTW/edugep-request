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

<div class="container d-flex justify-content-center p-4 col-10 rounded mt-5" id="eqArea">                                                                                                          
    <div class="table-responsive" style="height: 300px">
    <div class="input-group rounded w-50 mb-2">
        <input type="search" class="form-control rounded" id="search-input" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button id="search-button" name="search-button" type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>     
        <table class="table text text-light" id="repairs">
            <thead>
                <tr>
                <th scope="col">
                    Inventory ID
                </th>
                <th scope="col">
                    Item identification
                </th>
                <th scope="col">
                    Brand
                </th>
                <th scope="col">
                    Model
                </th>
                <th scope="col">
                    Serial-number
                </th>
                <th scope="col">
                    Responsible
                </th>
                <th scope="col">
                    Data de abate
                </th>
                <th scope="col">
                    Data de abate
                </th>
                <th scope="col">
                    <input type='checkbox' class='form-check-input' onclick="toggleSelectAll()">
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $serverName = "localhost";
            $username = "root";
            $password = "";
            $databaseName = "edugep-data";  
            
            $conn = mysqli_connect($serverName, $username, $password, $databaseName);                    
            $result = mysqli_query($conn, "SELECT * FROM Inventory");
            
            while ($row = mysqli_fetch_array($result)) {
                $curr = $row["user_ID"];
                echo "<tr>";
                echo "<td id='inventory-id'>" . $row["Inventory_ID"] . "</td>";
                echo "<td><input type='text' value='" . $row["item_identification"] . "' class='edit-input' name='item_identification' data-field='item_identification'></td>";
                echo "<td><input type='text' value='" . $row["Brand"] . "' class='edit-input' name='Brand' data-field='Brand'></td>";
                echo "<td><input type='text' value='" . $row["Model"] . "' class='edit-input' name='Model' data-field='Model'></td>";
                echo "<td><input type='text' value='" . $row["Serial-number"] . "' class='edit-input' name='Serial-number' data-field='Serial-number'></td>";
                echo "<td><input type='text' value='" . $row["Responsible"] . "' class='edit-input' name='Responsible' data-field='Responsible'></td>";
                echo "<td><input type='text' value='" . $row["Data de abate"] . "' class='edit-input' name='Data de abate' data-field='Data de abate'></td>";
                echo "<td><input type='text' value='" . $row["Comments"] . "' class='edit-input' name='Comments' data-field='Comments'></td>";
                echo "<td><input class='form-check-input' type='checkbox'></td>";
                echo "</tr>";
            }
            mysqli_close($conn);
            ?>
            </tbody>
        </table>
        <div id="printPdfBtn" class="justify-content-end d-flex">
            <button onclick="downloadTable()" class="formButton submitEq">Download CSV</button>
        </div>
    </div> 
</div>
<script>
    $(document).ready(function() {
        $('#search-button').click(function() {
            var query = $('#search-input').val();
            $.ajax({
                url: 'search.php',
                type: 'post',
                data: {query: query},
                success: function(response) {
                    $('#results').html(response);
                }
            });
        });
    });

    const editInputs = document.querySelectorAll('.edit-input');
        editInputs.forEach(function(input) {
            input.addEventListener('click', function() {
                input.removeAttribute('readonly');
            });
            input.addEventListener('blur', function() {
                input.setAttribute('readonly', true);
                let id = document.getElementById("inventory-id");
                let value = id.textContent;
                saveData(value, input.dataset.field, input.value);
            });
        });

function saveData(id, field, value) {
    console.log("X", id);
    $.ajax({
        url: 'savedata.php',
        method: 'POST',
        data: {
            id: id,
            field: field,
            value: value,
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

function downloadTable() {
    var table = document.getElementById("repairs");
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

    var filename = "Repairs.csv";
    var csvFile = new Blob(["\ufeff", csv.join("\n")], {type: "text/csv;charset=utf-8"});
    var downloadLink = document.createElement("a");
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.setAttribute("download", filename);
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
  }

  var allSelected = false;
  
  function toggleSelectAll() {
    var checkboxes = document.querySelectorAll("#repairs tbody input[type=checkbox]");
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = !allSelected;
    }
    allSelected = !allSelected;
  }
</script>
