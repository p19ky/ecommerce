let ArrayOfWishlistBooks = [];

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
  // window.location.href = "http://localhost/ecommerce/public/allBooks";
  window.location.href = "allBooks";
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

const addToWishlistHeartIconLink = document.getElementsByClassName(
  "addToWishlistHeartIconLink"
);

const addToWishlistHeartIcon = document.getElementsByClassName(
  "addToWishlistHeartIcon"
);

const heartClicker = document.getElementsByClassName("heartClicker");

addToWishlistHeartIconLink.forEach(function (element) {
  element.addEventListener("click", function () {
    const icon = this.firstChild.nextSibling;
    const allHiddenDivs = document.getElementsByClassName("bookIdDiv");

    if (icon.style.color === "") {
      //Add to Wishlist
      let idOfBook = "";
      let srcOfBookImage = "";
      let collectionOfInfoFromCardBody = "";
      // console.log(this.childNodes);
      this.childNodes.forEach((ele) => {
        if (ele.tagName === "DIV") {
          if (ele.classList.contains("bookIdDiv")) {
            idOfBook = ele.innerHTML;
            // console.log(idOfBook);
          }
        }
      });

      allHiddenDivs.forEach((element) => {
        if (
          element.innerHTML === idOfBook &&
          element.parentNode.classList.contains("card-body")
        ) {
          collectionOfInfoFromCardBody = element.parentNode.childNodes;

          element.parentNode.parentNode.childNodes.forEach((el) => {
            if (el.tagName === "DIV") {
              if (el.classList.contains("view")) {
                el.childNodes.forEach((elem) => {
                  if (elem.tagName === "IMG") {
                    if (elem.classList.contains("card-img-top")) {
                      srcOfBookImage = elem.getAttribute("src");
                    }
                  }
                });
              }
            }
          });
        }
      });

      CreateWishlistItem(
        idOfBook,
        srcOfBookImage,
        collectionOfInfoFromCardBody
      );

      icon.style.color = "red";
      icon.classList.remove("far");
      icon.classList.remove("fa-heart");
      icon.classList.add("fas");
      icon.classList.add("fa-heart");
      this.style.background = "transparent";
      this.style.opacity = "1";
    } else {
      //Remove from Wishlist
      icon.style.color = "";
      icon.classList.remove("fas");
      icon.classList.remove("fa-heart");
      icon.classList.add("far");
      icon.classList.add("fa-heart");
      this.style.background = "#777676";
      this.style.opacity = "0.5";
    }
  });
});

$(".addToWishlistHeartIconLink")
  .mouseenter(function () {
    if (this.firstChild.nextSibling.style.color === "") {
      this.style.opacity = "0.9";
    }
  })
  .mouseleave(function () {
    if (this.firstChild.nextSibling.style.color === "") {
      this.style.opacity = "0.5";
    }
  });

function CreateWishlistItem(infoIdBook, infoSrcImage, infoCardBody) {
  const wishlistTableRow = document.createElement("tr");
  wishlistTableRow.classList.add("wishlistItem");

  let titleForTheBook = "";
  let authorForTheBook = "";
  let priceForTheBook = "";

  infoCardBody.forEach((eleme) => {
    if (eleme.tagName === "H4") {
      if (eleme.classList.contains("card-title")) {
        titleForTheBook = eleme.innerHTML;
        // console.log(titleForTheBook);
      }
    } else if (eleme.tagName === "P") {
      if (eleme.classList.contains("c-a")) {
        authorForTheBook = eleme.innerText;
        // console.log(authorForTheBook);
      }
    } else if (eleme.tagName === "P") {
      if (eleme.classList.contains("c-p")) {
        priceForTheBook = eleme.innerText;
        // console.log(priceForTheBook);
      }
    }
  });

  const titleAndAuthorTableData = document.createElement("td");
  const bookImage = document.createElement("img");
  bookImage.setAttribute("src", infoSrcImage);
  bookImage.setAttribute("style", "border-radius:5px;");
}
