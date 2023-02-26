// Get the ID input field
var idInput = document.getElementById("idnumber");

// Get the item name output field
var itemNameOutput = document.getElementById("myInput");

console.log("setting up event listener");

// Add an event listener to the ID input field to listen for input changes
idInput.addEventListener("input", function() {
  // Get the value of the ID input field
  var id = idInput.value;

  // Make an AJAX request to getItemName.php to get the item name for the given ID
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Set the value of the item name output field to the retrieved item name
        itemNameOutput.value = xhr.responseText;
      } else {
        console.log("Error: " + xhr.status);
      }
    }
  };
  xhr.open("GET", "get_item_name.php?id=" + id, true);
  xhr.send();
});
