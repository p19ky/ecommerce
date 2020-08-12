let currentUserId = "";

const shcartTotal = document.getElementById("shcartTotal");
const shcartPrices = document.getElementsByClassName("item-price");
const shcartQuantities = document.getElementsByClassName("item-quantity");
const shcartBadge = document.getElementById("shcartBadge");

if (document.body.contains(document.getElementById("shcartCheckout"))) {
  let URL = document.getElementById("shcartCheckout").getAttribute("onclick");
  currentUserId = URL.replace(/^\D+/g, "");
}

let ARRAYOFBOOKSINSHCART = [];
let ARRAYOFUSERSWITHSHOPPINGCART = [
  { idUser: currentUserId, ARRAYOFBOOKSINSHCART: [] },
];

if (typeof Storage !== "undefined") {
  if (localStorage.getItem("ARRAYOFUSERSWITHSHOPPINGCART") === null) {
    localStorage.setItem(
      "ARRAYOFUSERSWITHSHOPPINGCART",
      JSON.stringify(ARRAYOFUSERSWITHSHOPPINGCART)
    );
  } else {
    //extract data from local storage
    ARRAYOFUSERSWITHSHOPPINGCART = JSON.parse(
      localStorage.getItem("ARRAYOFUSERSWITHSHOPPINGCART")
    );

    let foundThisGuy = false;

    ARRAYOFUSERSWITHSHOPPINGCART.forEach((pers) => {
      if ("idUser" in pers) {
        if (pers["idUser"] === currentUserId) {
          foundThisGuy = true;
          if ("ARRAYOFBOOKSINSHCART" in pers) {
            ARRAYOFBOOKSINSHCART = pers["ARRAYOFBOOKSINSHCART"];
          }
        }
      }
    });

    if (!foundThisGuy) {
      ARRAYOFUSERSWITHSHOPPINGCART.push({
        idUser: currentUserId,
        ARRAYOFBOOKSINSHCART: [],
      });

      localStorage.setItem(
        "ARRAYOFUSERSWITHSHOPPINGCART",
        JSON.stringify(ARRAYOFUSERSWITHSHOPPINGCART)
      );

      ARRAYOFBOOKSINSHCART = [];
    }

    fillShcart();
  }
} else {
  alert(
    "Your Browser doesn't support LocalStorage! - Wishlist And Shopping Cart Will NOT work... Please upgrade your browser or try using another one."
  );
}

console.log(Object.entries(localStorage));

function fillShcart() {
  ARRAYOFBOOKSINSHCART.forEach((bookie) => {
    createNewShcartItem(
      bookie["idBook"],
      bookie["imageBook"],
      bookie["titleBook"],
      bookie["authorBook"],
      bookie["priceBook"],
      bookie["quantityBook"]
    );
  });
}

const shoppingCartIcon = document.getElementById("shoppingCartIcon");
const shoppingCartTooltiptext = document
  .getElementById("shoppingCartIcon")
  .getElementsByClassName("shcartTooltiptext");

function showShoppingCart() {
  Array.prototype.filter.call(
    document
      .getElementById("shoppingCartIcon")
      .getElementsByClassName("shcartTooltiptext"),
    function (el) {
      if (el.style.visibility === "hidden" && el.style.opacity === "0") {
        el.style.visibility = "visible";
        el.style.opacity = "1";
      } else {
        el.style.visibility = "hidden";
        el.style.opacity = "0";
      }
    }
  );
}

shoppingCartIcon.addEventListener("click", showShoppingCart);

const shoppingCartItemsId = document.getElementById("shoppingCartItems"); //the div that containts the items
const shoppingCartItems = document.getElementsByClassName("shcart-item"); //all the items as HTMLCollection

function CalculateShoppingCartTotal() {
  const shcartPricesArray = [];
  const shcartQuantitiesArray = [];

  shcartPrices.forEach((element) => {
    shcartPricesArray.push(
      parseFloat(element.innerHTML.substr(1).replace(/,/g, "."))
    );
  });

  shcartQuantities.forEach((element) => {
    shcartQuantitiesArray.push(parseInt(element.innerHTML.match(/\d+/)[0]));
  });

  if (!shcartPricesArray.length || !shcartQuantitiesArray.length) {
    shcartTotal.innerHTML = "$0.00";
  } else {
    let shcartTotalSum = 0;

    for (let i = 0; i < shcartPricesArray.length; i++) {
      shcartTotalSum += shcartPricesArray[i] * shcartQuantitiesArray[i];
    }

    shcartTotal.innerHTML = "$" + shcartTotalSum.toFixed(2).toString();
  }

  // console.log("calculated shcart total!");
}

CalculateShoppingCartTotal();

function CalculateShcartBadge() {
  let quanArray = [];
  shcartQuantities.forEach((element) => {
    quanArray.push(parseInt(element.innerHTML.match(/\d+/)[0]));
  });

  if (!quanArray.length) {
    shcartBadge.innerHTML = "0";
  } else {
    const reducer = (accumulator, currentValue) => accumulator + currentValue;

    let badgeSum = quanArray.reduce(reducer);

    if (badgeSum < 100) {
      shcartBadge.innerHTML = badgeSum.toString();
    } else {
      shcartBadge.innerHTML = "99+";
    }
  }

  // console.log("calculated shcart badge number!");
}

CalculateShcartBadge();

function CheckIfShcartEmpty() {
  if (shcartBadge.innerHTML === "0") {
    // console.log("Shopping Cart empty!");
    let emptySpan = document.createElement("span");
    let emptySpanIcon = document.createElement("i");
    emptySpanIcon.classList.add("fas");
    emptySpanIcon.classList.add("fa-grin-beam-sweat");
    emptySpanIcon.setAttribute("style", "padding-left:10px;");

    emptySpan.setAttribute("style", "width:250px;");
    emptySpan.setAttribute("id", "shcartEmptySpan");
    emptySpan.classList.add("d-flex");
    emptySpan.classList.add("justify-content-center");
    emptySpan.classList.add("text-white");
    emptySpan.innerHTML = "Your Shopping Cart is Empty";
    emptySpan.appendChild(emptySpanIcon);
    shoppingCartItemsId.appendChild(emptySpan);
  } else {
    // console.log("Shopping Cart NOT empty!");
    if (document.body.contains(document.getElementById("shcartEmptySpan"))) {
      shoppingCartItemsId.removeChild(
        document.getElementById("shcartEmptySpan")
      );
    }
  }

  // console.log("checked if shcart empty!");
}

CheckIfShcartEmpty();

addToCartButtons = document.getElementsByClassName("addToCartMainClass");

$(".addToCartMainClass").click(function () {
  this.parentElement.parentElement.childNodes.forEach((Section) => {
    if (Section.tagName === "DIV") {
      if (Section.classList.contains("card-body")) {
        Section.childNodes.forEach((element) => {
          if (element.tagName === "H4") {
            if (element.classList.contains("card-title")) {
              infoAboutTitle = element.innerHTML;
            }
          }
          if (element.tagName === "P") {
            if (element.classList.contains("c-a")) {
              infoAboutAuthor = element.innerHTML;
            }
          }
          if (element.tagName === "P") {
            if (element.classList.contains("c-p")) {
              infoAboutPrice = element.innerHTML;
            }
          }
          if (element.tagName === "DIV") {
            if (element.classList.contains("bookIdDiv")) {
              infoAboutBookId = element.innerHTML;
            }
          }
        });
      }
    }
    if (Section.tagName === "DIV") {
      if (Section.classList.contains("view")) {
        Section.childNodes.forEach((elementt) => {
          if (elementt.tagName === "IMG") {
            if (elementt.classList.contains("card-img-top")) {
              infoAboutImage = elementt.getAttribute("src");
            }
          }
        });
      }
    }
  });

  if (!CheckIfBookAlreadyInCart(infoAboutBookId)) {
    //A
    //A
    //Add Book to Shopping Cart
    //A
    //A

    ARRAYOFBOOKSINSHCART.push({
      idBook: infoAboutBookId,
      imageBook: infoAboutImage,
      titleBook: infoAboutTitle,
      authorBook: infoAboutAuthor,
      priceBook: infoAboutPrice,
      quantityBook: "Quantity: 1",
    });

    ARRAYOFUSERSWITHSHOPPINGCART.forEach((person) => {
      if ("idUser" in person) {
        if (person["idUser"] === currentUserId) {
          if ("ARRAYOFBOOKSINSHCART" in person) {
            person["ARRAYOFBOOKSINSHCART"] = ARRAYOFBOOKSINSHCART;
          }
        }
      }
    });

    localStorage.setItem(
      "ARRAYOFUSERSWITHSHOPPINGCART",
      JSON.stringify(ARRAYOFUSERSWITHSHOPPINGCART)
    );

    createNewShcartItem(
      infoAboutBookId,
      infoAboutImage,
      infoAboutTitle,
      infoAboutAuthor,
      infoAboutPrice,
      "Quantity: 1"
    );
    CalculateShoppingCartTotal();
    CalculateShcartBadge();
    CheckIfShcartEmpty();

    // console.log(Object.entries(localStorage));

    ReloadDeleteAndRemAndAdd();
  } else {
    //R
    //R
    //Remove Book from Shopping Cart
    //R
    //R
    //Not sure if want to add this functionality to this button too.
  }
});

function ReloadDeleteAndRemAndAdd() {
  function DeleteElementFromShcart(e) {
    $("#modalConfirmDeleteShcartElement").modal({
      backdrop: "static",
      keyboard: false,
    });
    const localThis = this;
    const localEvent = e;

    document.getElementById(
      "confirmDeleteShcartElementYes"
    ).onclick = function () {
      localEvent.preventDefault();

      localThis.parentElement.childNodes.forEach((el) => {
        if (el.tagName === "SPAN") {
          if (el.classList.contains("hiddenBookIdSpan")) {
            let RemovedItem = el.innerHTML;

            ARRAYOFBOOKSINSHCART.forEach((dog) => {
              if ("idBook" in dog) {
                if (dog["idBook"] === RemovedItem) {
                  ARRAYOFBOOKSINSHCART.splice(
                    ARRAYOFBOOKSINSHCART.indexOf(dog),
                    1
                  );
                }
              }
            });

            ARRAYOFUSERSWITHSHOPPINGCART.forEach((User) => {
              if ("idUser" in User) {
                if (User["idUser"] === currentUserId) {
                  if ("ARRAYOFBOOKSINSHCART" in User) {
                    User["ARRAYOFBOOKSINSHCART"] = ARRAYOFBOOKSINSHCART;
                  }
                }
              }
            });

            localStorage.setItem(
              "ARRAYOFUSERSWITHSHOPPINGCART",
              JSON.stringify(ARRAYOFUSERSWITHSHOPPINGCART)
            );
          }
        }
      });

      $(localThis).closest(".shcart-item").remove();

      CalculateShoppingCartTotal();
      CalculateShcartBadge();
      CheckIfShcartEmpty();
    };

    showShoppingCart();
  }

  document.getElementsByClassName("bookDeleteTooltip").forEach((element) => {
    element.onclick = DeleteElementFromShcart;
  });

  function RemoveQuantity(e) {
    e.preventDefault();

    let currentQuantity = $(this)
      .closest(".shcart-item")
      .find(".item-quantity")
      .text();

    if (parseInt(currentQuantity.match(/\d+/)[0]) > 1) {
      let quantityAfterRemQuan = parseInt(currentQuantity.match(/\d+/)[0]) - 1;

      ARRAYOFBOOKSINSHCART.forEach((bookero) => {
        if ("idBook" in bookero) {
          if (
            bookero["idBook"] ===
            $(this).closest(".shcart-item").find(".hiddenBookIdSpan").text()
          ) {
            bookero["quantityBook"] =
              "Quantity: " + quantityAfterRemQuan.toString();
          }
        }
      });

      ARRAYOFUSERSWITHSHOPPINGCART.forEach((Usero) => {
        if ("idUser" in Usero) {
          if (Usero["idUser"] === currentUserId) {
            if ("ARRAYOFBOOKSINSHCART" in Usero) {
              Usero["ARRAYOFBOOKSINSHCART"] = ARRAYOFBOOKSINSHCART;
            }
          }
        }
      });

      localStorage.setItem(
        "ARRAYOFUSERSWITHSHOPPINGCART",
        JSON.stringify(ARRAYOFUSERSWITHSHOPPINGCART)
      );

      $(this)
        .closest(".shcart-item")
        .find(".item-quantity")
        .text("Quantity: " + quantityAfterRemQuan.toString());
      CalculateShoppingCartTotal();
      CalculateShcartBadge();
      CheckIfShcartEmpty();
    }
    showShoppingCart();
  }

  document.getElementsByClassName("remQuan").forEach((element) => {
    element.onclick = RemoveQuantity;
  });

  function AddQuantity(e) {
    e.preventDefault();

    let currentQuantity = $(this)
      .closest(".shcart-item")
      .find(".item-quantity")
      .text();
    let quantityAfterAddQuan = parseInt(currentQuantity.match(/\d+/)[0]) + 1;

    ARRAYOFBOOKSINSHCART.forEach((bookeros) => {
      if ("idBook" in bookeros) {
        if (
          bookeros["idBook"] ===
          $(this).closest(".shcart-item").find(".hiddenBookIdSpan").text()
        ) {
          bookeros["quantityBook"] =
            "Quantity: " + quantityAfterAddQuan.toString();
        }
      }
    });

    ARRAYOFUSERSWITHSHOPPINGCART.forEach((Useros) => {
      if ("idUser" in Useros) {
        if (Useros["idUser"] === currentUserId) {
          if ("ARRAYOFBOOKSINSHCART" in Useros) {
            Useros["ARRAYOFBOOKSINSHCART"] = ARRAYOFBOOKSINSHCART;
          }
        }
      }
    });

    localStorage.setItem(
      "ARRAYOFUSERSWITHSHOPPINGCART",
      JSON.stringify(ARRAYOFUSERSWITHSHOPPINGCART)
    );

    $(this)
      .closest(".shcart-item")
      .find(".item-quantity")
      .text("Quantity: " + quantityAfterAddQuan.toString());

    CalculateShoppingCartTotal();
    CalculateShcartBadge();
    CheckIfShcartEmpty();
    showShoppingCart();
  }

  document.getElementsByClassName("addQuan").forEach((element) => {
    element.onclick = AddQuantity;
  });
}

ReloadDeleteAndRemAndAdd();

function createNewShcartItem(
  dataAboutBookId,
  dataAboutImage,
  dataAboutTitle,
  dataAboutAuthor,
  dataAboutPrice,
  dataAboutQuantity
) {
  const mainListItem = document.createElement("li");
  mainListItem.classList.add("shcart-item");

  //delete Span
  const deleteSpan = document.createElement("span");
  deleteSpan.classList.add("bookDeleteTooltip");
  deleteSpan.innerHTML = "Delete";

  //Book Image
  const bookImage = document.createElement("img");
  bookImage.setAttribute("src", dataAboutImage);
  bookImage.setAttribute("alt", dataAboutTitle);

  //Book Title
  const bookTitle = document.createElement("span");
  bookTitle.classList.add("item-name");
  if (dataAboutTitle.length > 30) {
    let titlePart = dataAboutTitle.substring(0, 30);
    titlePart += "...";
    bookTitle.innerHTML = titlePart;
  } else {
    bookTitle.innerHTML = dataAboutTitle;
  }

  //Book Price
  const bookPrice = document.createElement("span");
  bookPrice.classList.add("item-price");
  bookPrice.innerHTML = dataAboutPrice;

  //Book Quantity
  const bookQuantity = document.createElement("span");
  bookQuantity.classList.add("item-quantity");
  bookQuantity.innerHTML = dataAboutQuantity;

  //Book QuantityMinus
  const bookQuantityMinus = document.createElement("span");
  bookQuantityMinus.classList.add("remQuan");
  bookQuantityMinus.innerHTML = "Quantity-";

  //Book QuantityPlus
  const bookQuantityPlus = document.createElement("span");
  bookQuantityPlus.classList.add("addQuan");
  bookQuantityPlus.innerHTML = "Quantity+";

  //Book Id Hidden Span
  const bookHiddenId = document.createElement("span");
  bookHiddenId.classList.add("hiddenBookIdSpan");
  bookHiddenId.setAttribute("style", "display:none;");
  bookHiddenId.innerHTML = dataAboutBookId;

  //Book Author hidden P
  const bookHiddenAuthor = document.createElement("p");
  bookHiddenAuthor.classList.add("hiddenBookAuthorP");
  bookHiddenAuthor.setAttribute("style", "display:none;");
  bookHiddenAuthor.innerHTML = dataAboutAuthor;

  //Book Quantity hidden Div
  const bookHiddenQuantity = document.createElement("div");
  bookHiddenQuantity.classList.add("hiddenBookQuantityDiv");
  bookHiddenQuantity.setAttribute("style", "display:none;");
  bookHiddenQuantity.innerHTML = dataAboutAuthor;

  mainListItem.append(deleteSpan, bookImage);
  mainListItem.appendChild(bookTitle);
  mainListItem.appendChild(bookPrice);
  mainListItem.appendChild(bookQuantity);
  mainListItem.append(bookQuantityMinus, bookQuantityPlus);
  mainListItem.appendChild(bookHiddenId);
  mainListItem.appendChild(bookHiddenAuthor);
  mainListItem.appendChild(bookHiddenQuantity);

  document.getElementById("shoppingCartItems").appendChild(mainListItem);
}

function CheckIfBookAlreadyInCart(dataAboutBookId) {
  let alreadyInShoppingCart = false;

  ARRAYOFUSERSWITHSHOPPINGCART.forEach((user) => {
    if ("idUser" in user) {
      if (user["idUser"] === currentUserId) {
        if ("ARRAYOFBOOKSINSHCART" in user) {
          if (user["ARRAYOFBOOKSINSHCART"].length !== 0) {
            user["ARRAYOFBOOKSINSHCART"].forEach((book) => {
              if ("idBook" in book) {
                if (book["idBook"] === dataAboutBookId) {
                  alreadyInShoppingCart = true;
                }
              }
            });
          }
        }
      }
    }
  });

  if (!alreadyInShoppingCart) {
    //Book Not in Cart yet!
    alert("Book added to Cart!");
    return false;
  } else {
    alert("Book Already in Cart!");
    return true;
  }
}

document
  .getElementsByClassName("wishlistAddToCartButton")
  .forEach((element) => {
    element.addEventListener("click", function () {
      let iBookId = "";
      let iBookImage = "";
      let iBookTitle = "";
      let iBookAuthor = "";
      let iBookPrice = "";

      this.parentElement.childNodes.forEach((dataRow) => {
        if (dataRow.tagName === "TD") {
          dataRow.childNodes.forEach((littleItem) => {
            if (littleItem.tagName === "IMG") {
              iBookImage = littleItem.getAttribute("src");
            }
            if (littleItem.tagName === "SPAN") {
              if (littleItem.classList.contains("titleSpan")) {
                iBookTitle = littleItem.innerHTML;
              }
            }
            if (littleItem.tagName === "SPAN") {
              if (littleItem.classList.contains("AuthorSpan")) {
                iBookAuthor = littleItem.innerHTML;
              }
            }
            if (littleItem.tagName === "SPAN") {
              if (littleItem.classList.contains("priceSpan")) {
                iBookPrice = littleItem.innerHTML;
              }
            }
          });
        }
      });
    });
  });

// window.localStorage.removeItem("ARRAYOFUSERSWITHSHOPPINGCART");

// console.log(Object.entries(localStorage));
