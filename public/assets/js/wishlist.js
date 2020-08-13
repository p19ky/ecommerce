let ARRAYOFWISHLISTBOOKS = [];
let ARRAYOFUSERSWITHWISHLISTBOOKS = [
  { userId: "guest", ARRAYOFWISHLISTBOOKS: [] },
];

let idUser = "";

if (typeof Storage !== "undefined") {
  if (localStorage.getItem("ARRAYOFUSERSWITHWISHLISTBOOKS") === null) {
    localStorage.setItem(
      "ARRAYOFUSERSWITHWISHLISTBOOKS",
      JSON.stringify(ARRAYOFUSERSWITHWISHLISTBOOKS)
    );
  } else {
    ARRAYOFUSERSWITHWISHLISTBOOKS = JSON.parse(
      localStorage.getItem("ARRAYOFUSERSWITHWISHLISTBOOKS")
    );

    if (document.body.contains(document.getElementById("shcartCheckout"))) {
      let URL = document
        .getElementById("shcartCheckout")
        .getAttribute("onclick");
      idUser = URL.replace(/^\D+/g, "");

      ARRAYOFUSERSWITHWISHLISTBOOKS.forEach((USERR) => {
        if ("userId" in USERR) {
          if (USERR["userId"] === idUser) {
            if ("ARRAYOFWISHLISTBOOKS" in USERR) {
              ARRAYOFWISHLISTBOOKS = USERR["ARRAYOFWISHLISTBOOKS"];
            }
          }
        }
      });
    } else {
      idUser = "guest";
      ARRAYOFUSERSWITHWISHLISTBOOKS.forEach((USER) => {
        if ("userId" in USER) {
          if (USER["userId"] === "guest") {
            if ("ARRAYOFWISHLISTBOOKS" in USER) {
              ARRAYOFWISHLISTBOOKS = USER["ARRAYOFWISHLISTBOOKS"];
            }
          }
        }
      });
    }
  }

  ///Shopping Cart Check for empty instances
  ARRAYOFUSERSWITHSHOPPINGCART.forEach((perso) => {
    if ("idUser" in perso) {
      if (perso["idUser"] === "") {
        ARRAYOFUSERSWITHSHOPPINGCART.splice(
          ARRAYOFUSERSWITHSHOPPINGCART.indexOf(perso),
          1
        );

        localStorage.setItem(
          "ARRAYOFUSERSWITHSHOPPINGCART",
          JSON.stringify(ARRAYOFUSERSWITHSHOPPINGCART)
        );
      }
    }
  });
  ///Shopping Cart Check for empty instances

  // console.log(Object.entries(localStorage));
} else {
  alert(
    "Your Browser doesn't support LocalStorage! - Wishlist And Shopping Cart Will NOT work... Please upgrade your browser or try using another one."
  );
}

function FillWishlist() {
  if (ARRAYOFWISHLISTBOOKS.length !== 0) {
    ARRAYOFWISHLISTBOOKS.forEach((wish) => {
      if (
        "bookId" in wish &&
        "title" in wish &&
        "author" in wish &&
        "price" in wish &&
        "image" in wish
      ) {
        CreateWishlistItem(
          wish["bookId"],
          wish["image"],
          wish["title"],
          wish["author"],
          wish["price"]
        );
      }
    });
    CheckIfWishlistIsEmpty();
  }
}

FillWishlist();

function ColorizeRedHearts() {
  if (document.body.contains(document.getElementById("allBooksMainContainer"))) {
    let listOfCards = document.getElementById("booksCardDeck").childNodes;

    listOfCards.forEach((card) => {
      if (card.tagName === "DIV") {
        if (card.classList.contains("card")) {
          card.childNodes.forEach((part) => {
            if (part.tagName === "DIV") {
              if (part.classList.contains("view")) {
                part.childNodes.forEach((EL) => {
                  if (EL.tagName === "SPAN") {
                    if (EL.classList.contains("wishlistHeartContainer")) {
                      EL.childNodes.forEach((sec) => {
                        if (sec.tagName === "A") {
                          if (
                            sec.classList.contains("addToWishlistHeartIconLink")
                          ) {
                            sec.childNodes.forEach((itemos) => {
                              if (itemos.tagName === "DIV") {
                                if (itemos.classList.contains("bookIdDiv")) {
                                  let currentIdInsideCard = itemos.innerHTML;

                                  if (ARRAYOFWISHLISTBOOKS.length === 0) {
                                    itemos.parentElement.childNodes.forEach(
                                      (line) => {
                                        if (line.tagName === "I") {
                                          line.style.color = "";
                                          line.classList.remove("fas");
                                          line.classList.remove("fa-heart");
                                          line.classList.add("far");
                                          line.classList.add("fa-heart");
                                          sec.style.background = "#777676";
                                          sec.style.opacity = "0.5";
                                        }
                                      }
                                    );
                                  }

                                  let foundOneHeart = false;

                                  ARRAYOFWISHLISTBOOKS.forEach((book) => {
                                    if ("bookId" in book) {
                                      if (
                                        book["bookId"] === currentIdInsideCard
                                      ) {
                                        foundOneHeart = true;
                                        itemos.parentElement.childNodes.forEach(
                                          (line) => {
                                            if (line.tagName === "I") {
                                              line.style.color = "red";
                                              line.classList.remove("far");
                                              line.classList.remove("fa-heart");
                                              line.classList.add("fas");
                                              line.classList.add("fa-heart");
                                              sec.style.background =
                                                "transparent";
                                              sec.style.opacity = "1";
                                            }
                                          }
                                        );
                                      }
                                    }
                                  });

                                  if (!foundOneHeart) {
                                    itemos.parentElement.childNodes.forEach(
                                      (line) => {
                                        if (line.tagName === "I") {
                                          line.style.color = "";
                                          line.classList.remove("fas");
                                          line.classList.remove("fa-heart");
                                          line.classList.add("far");
                                          line.classList.add("fa-heart");
                                          sec.style.background = "#777676";
                                          sec.style.opacity = "0.5";
                                        }
                                      }
                                    );
                                  }
                                }
                              }
                            });
                          }
                        }
                      });
                    }
                  }
                });
              }
            }
          });
        }
      }
    });
  }
  
}

ColorizeRedHearts();

// window.localStorage.removeItem("ARRAYOFUSERSWITHWISHLISTBOOKS");

// console.log(Object.entries(localStorage));

const wishlistModalBody = document.getElementById("wishlistModalBody");
const modalWishlist = document.getElementById("modalWishlist");
const modalCloseWishlist = document.getElementById("closeModalWishlistButton");
const modalAddAllToCart = document.getElementById("addAllModalWishlistButton");

modalCloseWishlist.addEventListener("click", function () {
  modalWishlist.classList.remove("show");
  modalWishlist.classList.add("left");
});

if (!document.body.contains(document.getElementById("hiddenCheckForAuth"))) {
  document
    .getElementById("addAllModalWishlistButtonGuest")
    .addEventListener("click", function () {
      modalWishlist.classList.remove("show");
      modalWishlist.classList.add("right");
    });
}
if (document.body.contains(document.getElementById("hiddenCheckForAuth"))) {
  document
    .getElementById("addAllModalWishlistButton")
    .addEventListener("click", function () {
      modalWishlist.classList.remove("show");
      modalWishlist.classList.add("right");
    });
}

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

      document
        .getElementById("wishlistModalBody")
        .appendChild(emptyWishlistDiv);
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

function ReloadDeleteIconsForWishlist() {
  const removeItemWishlistClassList = document.getElementsByClassName(
    "removeItemWishlistClass"
  );

  removeItemWishlistClassList.forEach((elementt) => {
    elementt.addEventListener("click", () => {
      let hasToBeDeletedId = "";
      elementt.closest(".wishlistItem").childNodes.forEach((data) => {
        if (data.tagName === "DIV") {
          if (data.classList.contains("bookIdDiv")) {
            hasToBeDeletedId = data.innerHTML;
          }
        }
      });

      ARRAYOFWISHLISTBOOKS.forEach((carte) => {
        if ("bookId" in carte) {
          if (carte["bookId"] === hasToBeDeletedId) {
            ARRAYOFWISHLISTBOOKS.splice(ARRAYOFWISHLISTBOOKS.indexOf(carte), 1);
          }
        }
      });

      ARRAYOFUSERSWITHWISHLISTBOOKS.forEach((persona) => {
        if ("userId" in persona) {
          if (persona["userId"] === idUser) {
            if ("ARRAYOFWISHLISTBOOKS" in persona) {
              persona["ARRAYOFWISHLISTBOOKS"] = ARRAYOFWISHLISTBOOKS;
            }
          }
        }
      });

      localStorage.setItem(
        "ARRAYOFUSERSWITHWISHLISTBOOKS",
        JSON.stringify(ARRAYOFUSERSWITHWISHLISTBOOKS)
      );

      elementt.closest(".wishlistItem").remove();
      CheckIfWishlistIsEmpty();
      ColorizeRedHearts();
    });
  });
}

ReloadDeleteIconsForWishlist();

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
          }
        }
        if (eleme.tagName === "P") {
          if (eleme.classList.contains("c-a")) {
            authorForTheBook = eleme.innerText;
          }
        }
        if (eleme.tagName === "P") {
          if (eleme.classList.contains("c-p")) {
            priceForTheBook = eleme.innerText;
          }
        }
      });

      let shouldIAddToWishlist = true;
      let IsUser = false;
      let idOfUser = "";

      if (document.body.contains(document.getElementById("shcartCheckout"))) {
        IsUser = true;
        let url = document
          .getElementById("shcartCheckout")
          .getAttribute("onclick");
        idOfUser = url.replace(/^\D+/g, "");
      }

      let foundUser = false;

      if (IsUser) {
        ARRAYOFUSERSWITHWISHLISTBOOKS.forEach((user) => {
          if ("userId" in user) {
            if (user["userId"] === idOfUser) {
              foundUser = true;
              if ("ARRAYOFWISHLISTBOOKS" in user) {
                user["ARRAYOFWISHLISTBOOKS"].forEach((item) => {
                  if ("bookId" in item) {
                    if (item["bookId"] === idOfBook) {
                      shouldIAddToWishlist = false;
                    }
                  }
                });
              }
            }
          }
        });

        if (!foundUser) {
          let newCompleteUser = { userId: idOfUser, ARRAYOFWISHLISTBOOKS: [] };
          ARRAYOFUSERSWITHWISHLISTBOOKS.push(newCompleteUser);

          localStorage.setItem(
            "ARRAYOFUSERSWITHWISHLISTBOOKS",
            JSON.stringify(ARRAYOFUSERSWITHWISHLISTBOOKS)
          );

          ARRAYOFWISHLISTBOOKS = [];
        }
      } else {
        ARRAYOFUSERSWITHWISHLISTBOOKS.forEach((u) => {
          if ("userId" in u) {
            if (u["userId"] === "guest") {
              if ("ARRAYOFWISHLISTBOOKS" in u) {
                u["ARRAYOFWISHLISTBOOKS"].forEach((ite) => {
                  if ("bookId" in ite) {
                    if (ite["bookId"] === idOfBook) {
                      shouldIAddToWishlist = false;
                    }
                  }
                });
              }
            }
          }
        });
      }

      if (shouldIAddToWishlist) {
        //A
        //A
        //Add to Wishlist
        //A
        //A

        let newItem = {
          bookId: idOfBook,
          title: titleForTheBook,
          author: authorForTheBook,
          price: priceForTheBook,
          image: srcOfBookImage,
        };

        ARRAYOFWISHLISTBOOKS.push(newItem);

        if (IsUser) {
          ARRAYOFUSERSWITHWISHLISTBOOKS.forEach((person) => {
            if ("userId" in person) {
              if (person["userId"] === idOfUser) {
                person["ARRAYOFWISHLISTBOOKS"] = ARRAYOFWISHLISTBOOKS;
              }
            }
          });
        } else {
          ARRAYOFUSERSWITHWISHLISTBOOKS.forEach((person) => {
            if ("userId" in person) {
              if (person["userId"] === "guest") {
                person["ARRAYOFWISHLISTBOOKS"] = ARRAYOFWISHLISTBOOKS;
              }
            }
          });
        }

        localStorage.setItem(
          "ARRAYOFUSERSWITHWISHLISTBOOKS",
          JSON.stringify(ARRAYOFUSERSWITHWISHLISTBOOKS)
        );

        CreateWishlistItem(
          idOfBook,
          srcOfBookImage,
          titleForTheBook,
          authorForTheBook,
          priceForTheBook
        );

        icon.style.color = "red";
        icon.classList.remove("far");
        icon.classList.remove("fa-heart");
        icon.classList.add("fas");
        icon.classList.add("fa-heart");
        this.style.background = "transparent";
        this.style.opacity = "1";

        // console.log(Object.entries(localStorage));
      } else {
        //R
        //R
        //Remove from Wishlist
        //R
        //R

        ARRAYOFWISHLISTBOOKS.forEach((element) => {
          if ("bookId" in element) {
            if (element["bookId"] === idOfBook) {
              ARRAYOFWISHLISTBOOKS.splice(
                ARRAYOFWISHLISTBOOKS.indexOf(element),
                1
              );
            }
          }
        });

        ARRAYOFUSERSWITHWISHLISTBOOKS.forEach((p) => {
          if ("userId" in p) {
            if (p["userId"] === idOfUser) {
              if ("ARRAYOFWISHLISTBOOKS" in p) {
                p["ARRAYOFWISHLISTBOOKS"] = ARRAYOFWISHLISTBOOKS;
              }
            }
          }
        });

        localStorage.setItem(
          "ARRAYOFUSERSWITHWISHLISTBOOKS",
          JSON.stringify(ARRAYOFUSERSWITHWISHLISTBOOKS)
        );

        let thisToBeDeleted = "";

        document
          .getElementById("wishlistItemList")
          .childNodes.forEach((row) => {
            if (row.tagName === "TR") {
              thisToBeDeleted = row;
              row.childNodes.forEach((elementtt) => {
                if (elementtt.tagName === "DIV") {
                  if (elementtt.classList.contains("bookIdDiv")) {
                    if (elementtt.innerHTML === idOfBook) {
                      thisToBeDeleted.remove();
                      CheckIfWishlistIsEmpty();
                    }
                  }
                }
              });
            }
          });

        icon.style.color = "";
        icon.classList.remove("fas");
        icon.classList.remove("fa-heart");
        icon.classList.add("far");
        icon.classList.add("fa-heart");
        this.style.background = "#777676";
        this.style.opacity = "0.5";

        // console.log(Object.entries(localStorage));
      }

      reloadWishlistAddToCartButton();
      ReloadDeleteIconsForWishlist();
    } else {
      alert(
        "Your Browser doesn't support LocalStorage! - Wishlist And Shopping Cart Will NOT work... Please upgrade your browser or try using another one."
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

function CreateWishlistItem(
  infoIdBook,
  infoSrcImage,
  infoTitle,
  infoAuthor,
  infoPrice
) {
  const wishlistTableRow = document.createElement("tr");
  wishlistTableRow.classList.add("wishlistItem");

  let titleForTheBook = infoTitle;
  let authorForTheBook = infoAuthor;
  let priceForTheBook = infoPrice;

  const imageTableData = document.createElement("td");
  const bookImage = document.createElement("img");
  bookImage.setAttribute("src", infoSrcImage);
  bookImage.setAttribute("style", "border-radius:5px;");
  bookImage.setAttribute("alt", titleForTheBook);
  bookImage.setAttribute("width", "60");
  bookImage.setAttribute("height", "60");
  imageTableData.appendChild(bookImage);

  const titleAndAuthorTableData = document.createElement("td");
  const titleSpan = document.createElement("span");
  const AuthorSpan = document.createElement("span");
  titleSpan.classList.add("titleSpan");
  titleSpan.innerHTML = titleForTheBook;
  AuthorSpan.classList.add("AuthorSpan");
  AuthorSpan.innerHTML = authorForTheBook;
  titleAndAuthorTableData.appendChild(titleSpan);
  titleAndAuthorTableData.innerHTML += "<br />";
  titleAndAuthorTableData.appendChild(AuthorSpan);

  const priceTableData = document.createElement("td");
  const priceSpan = document.createElement("span");
  priceSpan.classList.add("priceSpan");
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
  hiddenForIdBook.innerHTML = infoIdBook;

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

    document.getElementById("wishlistModalBody").appendChild(wishlistTable);
  }
}

reloadWishlistAddToCartButton(); //Load Add to Cart Button Functionality
ReloadDeleteIconsForWishlist(); //Load Delete functionality from wishlist
CheckIfWishlistIsEmpty();
