var idInput = document.getElementById("idnumber");

var itemNameOutput = document.getElementById("myInput");

console.log("setting up event listener");

idInput.addEventListener("input", function() {
  var id = idInput.value;
    //EVERYONE HATES AJAX AM I RITE ?
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        itemNameOutput.value = xhr.responseText;
      } else {
        console.log("Error: " + xhr.status);
      }
    }
  };
  xhr.open("GET", "get_item_name.php?id=" + id, true);
  xhr.send();
});
