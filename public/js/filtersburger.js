document.addEventListener("DOMContentLoaded", function () {
    const smallFiltersButton = document.querySelector(".small-filters");
    const filtersSidebar = document.querySelector(".filters-side-bar");

    smallFiltersButton.addEventListener("click", function () {
        filtersSidebar.classList.toggle("show");
    });
});
