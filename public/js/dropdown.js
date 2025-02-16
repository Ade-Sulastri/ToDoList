document.addEventListener("DOMContentLoaded", function () {
  console.log("Dropdown script loaded!");
  const dropdownButton = document.querySelector(".dropdown-button");
  const dropdownMenu = document.querySelector(".dropdown-menu");

  if (dropdownButton && dropdownMenu) {
      dropdownButton.addEventListener("click", function () {
          console.log("Dropdown button clicked!");
          dropdownMenu.classList.toggle("hidden");
      });
  } else {
      console.error("Dropdown button or menu not found!");
  }
});
