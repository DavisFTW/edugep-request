const input = document.getElementById("myInput");
const dropdown = document.getElementById("myDropdown");
input.addEventListener("input", function () {
  const inputValue = this.value;

  const xhr = new XMLHttpRequest();

  xhr.open("GET", `getOptions.php?inputValue=${inputValue}`, true);
  
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      const options = JSON.parse(xhr.responseText);

      dropdown.innerHTML = "";
      options.forEach(function (option) {
        const optionElement = document.createElement("option");
        optionElement.value = option.value;
        optionElement.textContent = option.value;
        dropdown.appendChild(optionElement);
      });

      dropdown.addEventListener("change", function () {
        input.value = this.value;
        const selectedOption = options.find(function (option) {
          return option.value === this.value;
        }.bind(this));
        document.getElementById("idnumber").value = selectedOption.id;
      });
      // Enable dropdown if there are options, otherwise disable it
      if (options.length > 0) {
        dropdown.disabled = false;
      } else {
        dropdown.disabled = true;
      }
    }
  };
  xhr.send();
});