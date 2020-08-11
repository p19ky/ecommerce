let ARRAYOFWISHLISTBOOKS = [];

// if (typeof Storage !== "undefined") {
//   if (localStorage.getItem("ARRAYOFWISHLISTBOOKS") === null) {
//     localStorage.setItem(
//       "ARRAYOFWISHLISTBOOKS",
//       JSON.stringify(ARRAYOFWISHLISTBOOKS)
//     );
//   } else {
//     ARRAYOFWISHLISTBOOKS = JSON.parse(
//       localStorage.getItem("ARRAYOFWISHLISTBOOKS")
//     );
//   }
// } else {
//   alert(
//     "Your Browser doesn't support LocalStorage! - Please upgrade your browser or try using another one."
//   );
// }

const wishlistModalBody = document.getElementById("wishlistModalBody");
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

function changeWindowToAllBooks() {
  // window.location.href = "http://localhost/ecommerce/public/allBooks";
  window.location.href = "allBooks";
}

function CheckIfWishlistIsEmpty() {
  if (!document.body.contains(document.getElementById("emptyWishlistDiv"))) {
    if (document.getElementsByClassName("wishlistItem").length === 0) {
      if (
        document.body.contains(document.getElementById("wishlistItemTable"))
      ) {
        wishlistModalBody.removeChild(
          document.getElementById("wishlistItemTable")
        );
      }

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
      allBooksWishlistButton.setAttribute(
        "onclick",
        "changeWindowToAllBooks()"
      );
      allBooksWishlistButton.classList.add("btn");
      allBooksWishlistButton.classList.add("reversedGradientButton");
      allBooksWishlistButton.setAttribute("type", "button");
      allBooksWishlistButton.innerHTML = "All Books";

      wishlistAllBooksLinkDiv.appendChild(allBooksWishlistButton);

      emptyWishlistDiv.appendChild(wishlistAllBooksLinkDiv);

      $("#wishlistItemTable").remove();

      wishlistModalBody.appendChild(emptyWishlistDiv);
    }
  }
}

CheckIfWishlistIsEmpty();

const addToWishlistHeartIconLink = document.getElementsByClassName(
  "addToWishlistHeartIconLink"
);

const addToWishlistHeartIcon = document.getElementsByClassName(
  "addToWishlistHeartIcon"
);

const heartClicker = document.getElementsByClassName("heartClicker");

addToWishlistHeartIconLink.forEach(function (element) {
  element.addEventListener("click", function () {
    if (typeof Storage !== "undefined") {
      const icon = this.firstChild.nextSibling;
      const allHiddenDivs = document.getElementsByClassName("bookIdDiv");

      let idOfBook = "";
      this.childNodes.forEach((ele) => {
        if (ele.tagName === "DIV") {
          if (ele.classList.contains("bookIdDiv")) {
            idOfBook = ele.innerHTML;
            console.log(idOfBook);
          }
        }
      });

      let srcOfBookImage = "";
      let collectionOfInfoFromCardBody = "";

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

      collectionOfInfoFromCardBody.forEach((eleme) => {
        if (eleme.tagName === "H4") {
          if (eleme.classList.contains("card-title")) {
            titleForTheBook = eleme.innerHTML;
            // console.log(titleForTheBook);
          }
        }
        if (eleme.tagName === "P") {
          if (eleme.classList.contains("c-a")) {
            authorForTheBook = eleme.innerText;
            // console.log(authorForTheBook);
          }
        }
        if (eleme.tagName === "P") {
          if (eleme.classList.contains("c-p")) {
            priceForTheBook = eleme.innerText;
            // console.log(priceForTheBook);
          }
        }
      });

      if (!ARRAYOFWISHLISTBOOKS.includes(idOfBook)) {
        //A
        //A
        //Add to Wishlist
        //A
        //A

        ARRAYOFWISHLISTBOOKS.push(idOfBook);
        localStorage.setItem(
          "ARRAYOFWISHLISTBOOKS",
          JSON.stringify(ARRAYOFWISHLISTBOOKS)
        );

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
        //R
        //R
        //Remove from Wishlist
        //R
        //R
        icon.style.color = "";
        icon.classList.remove("fas");
        icon.classList.remove("fa-heart");
        icon.classList.add("far");
        icon.classList.add("fa-heart");
        this.style.background = "#777676";
        this.style.opacity = "0.5";
      }

      const removeItemWishlistClassList = document.getElementsByClassName(
        "removeItemWishlistClass"
      );

      removeItemWishlistClassList.forEach((elementt) => {
        elementt.addEventListener("click", () => {
          elementt.closest(".wishlistItem").remove();
          CheckIfWishlistIsEmpty();
        });
      });
    } else {
      alert(
        "Your Browser doesn't support LocalStorage! - Please upgrade your browser or try using another one."
      );
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
    }
    if (eleme.tagName === "P") {
      if (eleme.classList.contains("c-a")) {
        authorForTheBook = eleme.innerText;
        // console.log(authorForTheBook);
      }
    }
    if (eleme.tagName === "P") {
      if (eleme.classList.contains("c-p")) {
        priceForTheBook = eleme.innerText;
        // console.log(priceForTheBook);
      }
    }
  });

  const imageTableData = document.createElement("td");
  const bookImage = document.createElement("img");
  bookImage.setAttribute("src", infoSrcImage);
  bookImage.setAttribute("style", "border-radius:5px;");
  bookImage.setAttribute("alt", titleForTheBook);
  bookImage.setAttribute("width", "60");
  bookImage.setAttribute("height", "60");
  imageTableData.appendChild(bookImage);

  const titleAndAuthorTableData = document.createElement("td");
  const titleAndAuthorSpan = document.createElement("span");
  titleAndAuthorSpan.innerHTML = titleForTheBook + "<br />" + authorForTheBook;
  titleAndAuthorTableData.appendChild(titleAndAuthorSpan);

  const priceTableData = document.createElement("td");
  const priceSpan = document.createElement("span");
  priceSpan.innerHTML = priceForTheBook;
  priceTableData.appendChild(priceSpan);

  const AddToCartButtonTableData = document.createElement("td");
  const AddToCartFromWishlistButton = document.createElement("button");
  AddToCartFromWishlistButton.setAttribute("type", "button");
  AddToCartFromWishlistButton.classList.add("btn");
  AddToCartFromWishlistButton.classList.add("wishlistAddToCartButton");
  AddToCartFromWishlistButton.classList.add("btn-sm");
  AddToCartFromWishlistButton.classList.add("waves-effect");
  AddToCartFromWishlistButton.classList.add("waves-light");
  AddToCartFromWishlistButton.innerHTML = "Add to Cart";
  const shcartIconForATC = document.createElement("i");
  shcartIconForATC.classList.add("fas");
  shcartIconForATC.classList.add("fa-shopping-cart");
  AddToCartFromWishlistButton.appendChild(shcartIconForATC);
  AddToCartButtonTableData.appendChild(AddToCartFromWishlistButton);

  const removeWishlistItemTableData = document.createElement("td");
  const removeItemATag = document.createElement("a");
  const xIcon = document.createElement("i");
  xIcon.classList.add("removeItemWishlistClass");
  xIcon.classList.add("fas");
  xIcon.classList.add("fa-times");
  removeItemATag.appendChild(xIcon);
  removeWishlistItemTableData.appendChild(removeItemATag);

  const hiddenForIdBook = document.createElement("div");
  hiddenForIdBook.classList.add("bookIdDiv");
  hiddenForIdBook.setAttribute("style", "display:none;");

  wishlistTableRow.appendChild(imageTableData);
  wishlistTableRow.appendChild(titleAndAuthorTableData);
  wishlistTableRow.appendChild(priceTableData);
  wishlistTableRow.appendChild(AddToCartButtonTableData);
  wishlistTableRow.appendChild(removeWishlistItemTableData);
  wishlistTableRow.appendChild(hiddenForIdBook);

  AppendItemToWishlist(wishlistTableRow);
}

function AppendItemToWishlist(theWishlistNewItem) {
  if (document.body.contains(document.getElementById("wishlistItemTable"))) {
    //Append Item to Wishlist.
    //NO new table is created.
    document.getElementById("wishlistItemList").appendChild(theWishlistNewItem);
  } else {
    //First Row(item) in Wishlist Table to be added
    //new table is created!
    if (document.body.contains(document.getElementById("emptyWishlistDiv"))) {
      wishlistModalBody.removeChild(
        document.getElementById("emptyWishlistDiv")
      );
    }

    const wishlistTable = document.createElement("table");
    wishlistTable.setAttribute("id", "wishlistItemTable");
    wishlistTable.classList.add("text-white");
    wishlistTable.classList.add("table");

    const wishlistTableHead = document.createElement("thead");
    wishlistTableHead.classList.add("text-center");

    const singleTableHeadRow = document.createElement("tr");

    const tableHeaderCover = document.createElement("th");
    tableHeaderCover.innerHTML = "Cover";
    const tableHeaderTitleAndAuthor = document.createElement("th");
    tableHeaderTitleAndAuthor.innerHTML = "Title&Author";
    const tableHeaderPrice = document.createElement("th");
    tableHeaderPrice.innerHTML = "Price";
    const tableHeaderAddToCart = document.createElement("th");
    tableHeaderAddToCart.innerHTML = "Add to Cart";
    const tableHeaderRemove = document.createElement("th");
    tableHeaderRemove.innerHTML = "Remove";

    singleTableHeadRow.appendChild(tableHeaderCover);
    singleTableHeadRow.appendChild(tableHeaderTitleAndAuthor);
    singleTableHeadRow.appendChild(tableHeaderPrice);
    singleTableHeadRow.appendChild(tableHeaderAddToCart);
    singleTableHeadRow.appendChild(tableHeaderRemove);

    wishlistTableHead.appendChild(singleTableHeadRow);

    const wishlistTableBody = document.createElement("tbody");
    wishlistTableBody.setAttribute("id", "wishlistItemList");
    wishlistTableBody.classList.add("text-center");

    wishlistTableBody.appendChild(theWishlistNewItem);

    wishlistTable.appendChild(wishlistTableHead);
    wishlistTable.appendChild(wishlistTableBody);

    wishlistModalBody.appendChild(wishlistTable);
  }
}
