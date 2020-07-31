const modalWishlist = document.getElementById("modalWishlist");
const modalCloseWishlist = document.getElementById("closeModalWishlistButton");
const modalAddAllToCart = document.getElementById("addAllModalWishlistButton");

modalCloseWishlist.addEventListener("click", function () {
  modalWishlist.classList.remove("show");
  modalWishlist.classList.add("left");
});

modalAddAllToCart.addEventListener("click", function () {
  modalWishlist.classList.remove("show");
  modalWishlist.classList.add("right");
});

$("#modalWishlist").on("hidden.bs.modal", function () {
  modalWishlist.classList.remove("left");
  modalWishlist.classList.remove("right");
});

const removeItemWishlistClassList = document.getElementsByClassName(
  "removeItemWishlistClass"
);

$(".removeItemWishlistClass").click(function (e) {});
