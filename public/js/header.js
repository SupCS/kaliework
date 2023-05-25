const menuBtn = document.querySelector(".menu-btn");
const menu = document.querySelector(".burger-menu");
const overlay = document.querySelector(".burger-menu-overlay");

menuBtn.addEventListener("click", function () {
  menuBtn.classList.toggle("active");
  menu.classList.toggle("active");
  overlay.classList.remove("hidden");
  overlay.classList.toggle("block");
});
overlay.addEventListener("click", function () {
  menu.classList.toggle("active");
  menuBtn.classList.toggle("active");
  overlay.classList.remove("block");
  overlay.classList.toggle("hidden");
});