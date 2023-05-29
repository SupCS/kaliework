function toggleDropdown(dropdownId) {
  var dropdown = document.getElementById(dropdownId);
  dropdown.classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
};

// Обработчик выбора фитиля
var wickButtons = document.querySelectorAll('#wick-dropdown a');
wickButtons.forEach(function(button) {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    var selectedWick = button.getAttribute('data-wick');
    var dropbtnText = document.querySelector('.product-wick .dropbtn-text');
    dropbtnText.textContent = selectedWick;
  });
});

// Обработчик выбора аромата
var aromaButtons = document.querySelectorAll('#aroma-dropdown a');
aromaButtons.forEach(function(button) {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    var selectedAroma = button.getAttribute('data-aroma');
    var dropbtnText = document.querySelector('.product-aroma .dropbtn-text');
    dropbtnText.textContent = selectedAroma;
  });
});
