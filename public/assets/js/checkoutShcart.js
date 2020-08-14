function CreateCheckoutShcartItem(
  informationBookId,
  informationImage,
  informationTitle,
  informationAuthor,
  informationPrice,
  informationGenre,
  informationQuantity
) {
  const listItem = document.createElement("li");
  listItem.classList.add("list-group-item");
  listItem.classList.add("checkoutShcartItem");

  const hiddenBookId = document.createElement("div");
  hiddenBookId.classList.add("bookIdDiv");
  hiddenBookId.setAttribute("style", "display:none;");
  hiddenBookId.innerHTML = informationBookId;

  listItem.appendChild(hiddenBookId);

  const firstDivWithContent = document.createElement("div");
  firstDivWithContent.classList.add("checkoutShcartItemFirstContentDiv");

  const imageFirstDiv = document.createElement("img");
  imageFirstDiv.classList.add("checkoutShcartItemImage");
  imageFirstDiv.setAttribute("width", "100");
  imageFirstDiv.setAttribute("height", "100");
  imageFirstDiv.setAttribute("src", informationImage);
  imageFirstDiv.setAttribute("alt", informationTitle);

  firstDivWithContent.appendChild(imageFirstDiv);

  const firstDivSubSection = document.createElement("div");
  firstDivSubSection.classList.add("text-center");
  firstDivSubSection.classList.add("firstDivSubclass");

  const titleFirstDiv = document.createElement("h6");
  titleFirstDiv.classList.add("checkoutShcartItemTitle");
  titleFirstDiv.innerHTML = informationTitle;

  firstDivSubSection.appendChild(titleFirstDiv);

  const authorFirstDiv = document.createElement("small");
  authorFirstDiv.classList.add("checkoutShcartItemAuthor");
  authorFirstDiv.classList.add("text-muted");
  authorFirstDiv.innerHTML = informationAuthor;

  firstDivSubSection.appendChild(authorFirstDiv);

  const genreFirstDiv = document.createElement("h6");
  genreFirstDiv.classList.add("checkoutShcartItemGenre");
  genreFirstDiv.innerHTML = informationGenre;

  firstDivSubSection.appendChild(genreFirstDiv);

  firstDivWithContent.appendChild(firstDivSubSection);

  const priceFirstDiv = document.createElement("span");
  priceFirstDiv.classList.add("text-right");
  priceFirstDiv.classList.add("checkoutShcartItemPrice");
  priceFirstDiv.classList.add("text-muted");
  priceFirstDiv.innerHTML = informationPrice;

  firstDivWithContent.appendChild(priceFirstDiv);

  listItem.appendChild(firstDivWithContent);

  const emptyDivForShcartItem1 = document.createElement("div");
  emptyDivForShcartItem1.classList.add("emptyDivForShcartItem");

  listItem.appendChild(emptyDivForShcartItem1);

  const secondDivWithContent = document.createElement("div");
  secondDivWithContent.classList.add("checkoutShcartItemSecondContentDiv");

  const quanController = document.createElement("div");
  quanController.classList.add("quantityControllerClass");
  quanController.classList.add("text-left");

  const removeQuantityIcon = document.createElement("i");
  removeQuantityIcon.classList.add("remQuanCheckout");
  removeQuantityIcon.classList.add("fas");
  removeQuantityIcon.classList.add("fa-minus-square");

  const addQuantityIcon = document.createElement("i");
  addQuantityIcon.classList.add("addQuanCheckout");
  addQuantityIcon.classList.add("fas");
  addQuantityIcon.classList.add("fa-plus-square");

  quanController.appendChild(removeQuantityIcon);
  quanController.innerHTML += "Quantity";
  quanController.appendChild(addQuantityIcon);

  secondDivWithContent.appendChild(quanController);

  const quantitySecondDiv = document.createElement("div");
  quantitySecondDiv.classList.add("checkoutShcartItemQuantity");
  quantitySecondDiv.classList.add("text-center");
  quantitySecondDiv.innerHTML = informationQuantity;

  secondDivWithContent.appendChild(quantitySecondDiv);

  const deleteIconSecondDiv = document.createElement("div");
  deleteIconSecondDiv.classList.add("deleteDivForShcartItem");
  deleteIconSecondDiv.classList.add("text-right");

  const deleteIcon = document.createElement("i");
  deleteIcon.classList.add("checkoutShcartDeleteIcon");
  deleteIcon.classList.add("fas");
  deleteIcon.classList.add("fa-trash");

  deleteIconSecondDiv.appendChild(deleteIcon);

  secondDivWithContent.appendChild(deleteIconSecondDiv);

  listItem.appendChild(secondDivWithContent);

  const emptyDivForShcartItem2 = document.createElement("div");
  emptyDivForShcartItem2.classList.add("emptyDivForShcartItem");

  listItem.appendChild(emptyDivForShcartItem2);

  document.getElementById("checkoutShcartBookslist").appendChild(listItem);
}

function AppendTotalToCheckoutShcart() {
  const totalListItem = document.createElement("li");
  totalListItem.classList.add("list-group-item");
  totalListItem.classList.add("d-flex");
  totalListItem.classList.add("justify-content-between");

  const totalSpan = document.createElement("span");
  totalSpan.innerHTML = "Total (USD)";

  totalListItem.appendChild(totalSpan);

  const strongTotalNumber = document.createElement("strong");
  strongTotalNumber.setAttribute("id", "checkoutShcartTotal");

  totalListItem.appendChild(strongTotalNumber);

  document.getElementById("checkoutShcartBookslist").appendChild(totalListItem);
}

function CalculateTotalCheckoutShcart() {
  if (
    document.body.contains(document.getElementById("checkoutShcartBookslist"))
  ) {
    let arrayOfPrices = [];
    let arrayOfQuantities = [];

    document
      .getElementsByClassName("checkoutShcartItemPrice")
      .forEach((element) => {
        arrayOfPrices.push(
          parseFloat(element.innerHTML.substr(1).replace(/,/g, "."))
        );
      });

    document
      .getElementsByClassName("checkoutShcartItemQuantity")
      .forEach((element) => {
        arrayOfQuantities.push(parseInt(element.innerHTML.match(/\d+/)[0]));
      });

    if (!arrayOfPrices.length || !arrayOfQuantities.length) {
      document.getElementById("checkoutShcartTotal").innerHTML = "$0.00";
    } else {
      let total = 0;

      for (let i = 0; i < arrayOfPrices.length; i++) {
        total += arrayOfPrices[i] * arrayOfQuantities[i];
      }

      document.getElementById("checkoutShcartTotal").innerHTML =
        "$" + total.toFixed(2).toString();
    }
  }
}

// CalculateTotalCheckoutShcart();

function CalculateBadgeCheckoutShcart() {
  if (
    document.body.contains(document.getElementById("checkoutShcartBookslist"))
  ) {
    let arrayOfQuantities = [];

    document
      .getElementsByClassName("checkoutShcartItemQuantity")
      .forEach((element) => {
        arrayOfQuantities.push(parseInt(element.innerHTML.match(/\d+/)[0]));
      });

    if (!arrayOfQuantities.length) {
      document.getElementById("checkoutShcartBadge").innerHTML = "0";
    } else {
      const reducer = (accumulator, currentValue) => accumulator + currentValue;

      let badgeSum = arrayOfQuantities.reduce(reducer);

      if (badgeSum < 100) {
        document.getElementById("checkoutShcartBadge").innerHTML =
          "Nr. Books: " + badgeSum.toString();
      } else {
        document.getElementById("checkoutShcartBadge").innerHTML =
          "Nr. Books: 99+";
      }
    }
  }
}

// CalculateBadgeCheckoutShcart();

function RefreshRemAddDel() {
  document.getElementsByClassName("remQuanCheckout").forEach((element) => {
    element.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      e.stopImmediatePropagation();

      let currentQuantity = "";
      let currentQuantityDiv = "";

      element.parentElement.parentElement.childNodes.forEach((division) => {
        if (division.tagName === "DIV") {
          if (division.classList.contains("checkoutShcartItemQuantity")) {
            currentQuantity = division.innerHTML;
            currentQuantityDiv = division;
          }
        }
      });

      if (parseInt(currentQuantity.match(/\d+/)[0]) > 1) {
        let newQuantity = parseInt(currentQuantity.match(/\d+/)[0]) - 1;

        let currBookId = $(element)
          .closest(".checkoutShcartItem")
          .find(".bookIdDiv")
          .text();

        ARRAYOFBOOKSINSHCART.forEach((book) => {
          if ("idBook" in book) {
            if (book["idBook"] === currBookId) {
              book["quantityBook"] = "Quantity: " + newQuantity.toString();
            }
          }
        });

        ARRAYOFUSERSWITHSHOPPINGCART.forEach((user) => {
          if ("idUser" in user) {
            if (user["idUser"] === currentUserId) {
              if ("ARRAYOFBOOKSINSHCART" in user) {
                user["ARRAYOFBOOKSINSHCART"] = ARRAYOFBOOKSINSHCART;
              }
            }
          }
        });

        localStorage.setItem(
          "ARRAYOFUSERSWITHSHOPPINGCART",
          JSON.stringify(ARRAYOFUSERSWITHSHOPPINGCART)
        );

        document
          .getElementById("shoppingCartItems")
          .childNodes.forEach((rowFromNavCart) => {
            if (rowFromNavCart.tagName === "LI") {
              if (
                $(rowFromNavCart).find(".hiddenBookIdSpan").text() ===
                currBookId
              ) {
                $(rowFromNavCart)
                  .find(".item-quantity")
                  .text("Quantity: " + newQuantity.toString());

                CalculateShcartBadge();
                CalculateShoppingCartTotal();
              }
            }
          });

        currentQuantityDiv.innerHTML = "Quantity: " + newQuantity.toString();

        CalculateBadgeCheckoutShcart();
        CalculateTotalCheckoutShcart();
      }
    });
  });

  document.getElementsByClassName("addQuanCheckout").forEach((element) => {
    element.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      e.stopImmediatePropagation();

      let currentQuantity = "";
      let currentQuantityDiv = "";

      element.parentElement.parentElement.childNodes.forEach((division) => {
        if (division.tagName === "DIV") {
          if (division.classList.contains("checkoutShcartItemQuantity")) {
            currentQuantity = division.innerHTML;
            currentQuantityDiv = division;
          }
        }
      });

      let newQuantity = parseInt(currentQuantity.match(/\d+/)[0]) + 1;

      let currBookId = $(element)
        .closest(".checkoutShcartItem")
        .find(".bookIdDiv")
        .text();

      ARRAYOFBOOKSINSHCART.forEach((book) => {
        if ("idBook" in book) {
          if (book["idBook"] === currBookId) {
            book["quantityBook"] = "Quantity: " + newQuantity.toString();
          }
        }
      });

      ARRAYOFUSERSWITHSHOPPINGCART.forEach((user) => {
        if ("idUser" in user) {
          if (user["idUser"] === currentUserId) {
            if ("ARRAYOFBOOKSINSHCART" in user) {
              user["ARRAYOFBOOKSINSHCART"] = ARRAYOFBOOKSINSHCART;
            }
          }
        }
      });

      localStorage.setItem(
        "ARRAYOFUSERSWITHSHOPPINGCART",
        JSON.stringify(ARRAYOFUSERSWITHSHOPPINGCART)
      );

      document
        .getElementById("shoppingCartItems")
        .childNodes.forEach((rowFromNavCart) => {
          if (rowFromNavCart.tagName === "LI") {
            if (
              $(rowFromNavCart).find(".hiddenBookIdSpan").text() === currBookId
            ) {
              $(rowFromNavCart)
                .find(".item-quantity")
                .text("Quantity: " + newQuantity.toString());

              CalculateShcartBadge();
              CalculateShoppingCartTotal();
            }
          }
        });

      currentQuantityDiv.innerHTML = "Quantity: " + newQuantity.toString();

      CalculateBadgeCheckoutShcart();
      CalculateTotalCheckoutShcart();
    });
  });

  document
    .getElementsByClassName("checkoutShcartDeleteIcon")
    .forEach((element) => {
      element.addEventListener("click", (event) => {
        $("#modalConfirmDeleteCheckout").modal({
          backdrop: "static",
          keyboard: false,
        });

        document.getElementById("confirmDeleteCheckoutYes").onclick = () => {
          event.preventDefault();

          let myCurrentBookId = $(element)
            .closest(".checkoutShcartItem")
            .find(".bookIdDiv")
            .text();

          ARRAYOFBOOKSINSHCART.forEach((book) => {
            if (book["idBook"] === myCurrentBookId) {
              ARRAYOFBOOKSINSHCART.splice(
                ARRAYOFBOOKSINSHCART.indexOf(book),
                1
              );
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

          $(element).closest(".checkoutShcartItem").remove();

          document
            .getElementById("shoppingCartItems")
            .childNodes.forEach((row) => {
              if (row.tagName === "LI") {
                if (
                  $(row).find(".hiddenBookIdSpan").text() === myCurrentBookId
                ) {
                  $(row).remove();

                  CalculateShcartBadge();
                  CalculateShoppingCartTotal();
                }
              }
            });

          CalculateBadgeCheckoutShcart();
          CalculateTotalCheckoutShcart();
        };
      });
    });
}

// RefreshRemAddDel();

const FillCheckoutShoppingCart = () => {
  if (
    document.body.contains(document.getElementById("checkoutShcartBookslist"))
  ) {
    ARRAYOFBOOKSINSHCART.forEach((book) => {
      CreateCheckoutShcartItem(
        book["idBook"],
        book["imageBook"],
        book["titleBook"],
        book["authorBook"],
        book["priceBook"],
        book["genreBook"],
        book["quantityBook"]
      );
    });

    AppendTotalToCheckoutShcart();
    CalculateTotalCheckoutShcart();
    CalculateBadgeCheckoutShcart();
    RefreshRemAddDel();
  }
};

FillCheckoutShoppingCart();
