//MORE ICON TRANSFORM - START

const moreIcon = document.getElementById("moreIcon");

$("#moreDropdownListItem").on("shown.bs.dropdown", function () {
  moreIcon.style.transform = "rotate(90deg)";
});

$("#moreDropdownListItem").on("hidden.bs.dropdown", function () {
  moreIcon.style.transform = "rotate(0deg)";
});

//MORE ICON TRANSFORM - END

// MODAL - START

const modalAdvSearch = document.getElementById("advancedSearchModal");
const modalCancelButton = document.getElementById("modalCancelButton");
const modalSearchButton = document.getElementById("modalSearchButton");

modalCancelButton.addEventListener("click", function () {
  modalAdvSearch.classList.remove("show");
  modalAdvSearch.classList.add("left");
});

modalSearchButton.addEventListener("click", function () {
  modalAdvSearch.classList.remove("show");
  modalAdvSearch.classList.add("right");
  $("#advancedSearchModal").modal("toggle");
});

$("#advancedSearchModal").on("hidden.bs.modal", function () {
  modalAdvSearch.classList.remove("left");
  modalAdvSearch.classList.remove("right");
});

// MODAL - END
