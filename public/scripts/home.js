  const locationInput = document.getElementById("location-input");
  const locationDropdown = document.getElementById("location-dropdown");

  // Show/hide the dropdown when the input is clicked
  locationInput.addEventListener("click", () => {
    locationDropdown.classList.toggle("is-active");
  });

  // Set the selected location when a dropdown item is clicked
  const dropdownItems = document.querySelectorAll(".dropdown-item");
  dropdownItems.forEach(item => {
    item.addEventListener("click", event => {
      event.preventDefault();
      locationInput.value = item.textContent;
      locationDropdown.classList.remove("is-active");
    });
  });

  // Close the dropdown if the user clicks outside of it
  document.addEventListener("click", event => {
    if (!locationInput.contains(event.target)) {
      locationDropdown.classList.remove("is-active");
    }
  });

