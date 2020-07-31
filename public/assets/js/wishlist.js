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

$(".removeItemWishlistClass").click(function (e) {
  this.closest(".wishlistItem").remove();
  CheckIfWishlistIsEmpty();
});

function changeWindowToAllBooks() {
  window.location.href = "http://localhost/ecommerce/public/allBooks";
}

function CheckIfWishlistIsEmpty() {
  if (document.getElementsByClassName("wishlistItem").length === 0) {
    document
      .getElementById("wishlistModalBody")
      .removeChild(document.getElementById("wishlistItemTable"));

    const grinBeamSweatIcon = document.createElement("i");
    grinBeamSweatIcon.classList.add("fas");
    grinBeamSweatIcon.classList.add("fa-grin-beam-sweat");
    grinBeamSweatIcon.setAttribute("style", "padding-left:10px;");

    const smileBeamIcon = document.createElement("i");
    smileBeamIcon.classList.add("fas");
    smileBeamIcon.classList.add("fa-smile-beam");
    smileBeamIcon.setAttribute("style", "padding-left:10px;");

    const emptyWishlistDiv = document.createElement("div");
    emptyWishlistDiv.classList.add("text-center");
    emptyWishlistDiv.setAttribute("id", "emptyWishlistDiv");

    const emptyh5 = document.createElement("h5");
    emptyh5.innerHTML = "Your Wishlist is empty... ";
    emptyh5.appendChild(grinBeamSweatIcon);

    emptyWishlistDiv.appendChild(emptyh5);

    const wishlistAllBooksLinkDiv = document.createElement("div");
    wishlistAllBooksLinkDiv.setAttribute("id", "wishlistAllBooksLink");

    const suggesth5 = document.createElement("h5");
    suggesth5.innerHTML = "We suggest checking our books out ";
    suggesth5.appendChild(smileBeamIcon);

    wishlistAllBooksLinkDiv.appendChild(suggesth5);

    const allBooksWishlistButton = document.createElement("button");
    allBooksWishlistButton.setAttribute("id", "allBooksWishlistButton");
    allBooksWishlistButton.setAttribute("onclick", "changeWindowToAllBooks()");
    allBooksWishlistButton.classList.add("btn");
    allBooksWishlistButton.classList.add("reversedGradientButton");
    allBooksWishlistButton.setAttribute("type", "button");
    allBooksWishlistButton.innerHTML = "All Books";

    wishlistAllBooksLinkDiv.appendChild(allBooksWishlistButton);

    emptyWishlistDiv.appendChild(wishlistAllBooksLinkDiv);

    $("#wishlistItemTable").remove();

    document.getElementById("wishlistModalBody").appendChild(emptyWishlistDiv);
  }
}
