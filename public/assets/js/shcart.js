let ARRAYOFBOOKSINSHCART = [];
let ArrayOfBookIds = [];
const shoppingCartIcon = document.getElementById("shoppingCartIcon");
const shoppingCartTooltiptext = document
  .getElementById("shoppingCartIcon")
  .getElementsByClassName("shcartTooltiptext");

function showShoppingCart() {
  Array.prototype.filter.call(shoppingCartTooltiptext, function (el) {
    if (el.style.visibility === "hidden" && el.style.opacity === "0") {
      el.style.visibility = "visible";
      el.style.opacity = "1";
    } else {
      el.style.visibility = "hidden";
      el.style.opacity = "0";
    }
  });
}

shoppingCartIcon.addEventListener("click", showShoppingCart);

const shcartTotal = document.getElementById("shcartTotal");
const shcartPrices = document.getElementsByClassName("item-price");
const shcartQuantities = document.getElementsByClassName("item-quantity");
const shcartBadge = document.getElementById("shcartBadge");
const shoppingCartItemsId = document.getElementById("shoppingCartItems"); //the div that containts the items
const shoppingCartItems = document.getElementsByClassName("shcart-item"); //all the items as HTMLCollection

function CalculateShoppingCartTotal() {
  const shcartPricesArray = [];
  const shcartQuantitiesArray = [];

  shcartPrices.forEach((element) => {
    console.log(element);
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
  const savedThis = this;
  if (CheckIfBookAlreadyInCart(savedThis)) {
    createNewShcartItem(savedThis);
    CalculateShoppingCartTotal();
    CalculateShcartBadge();
    CheckIfShcartEmpty();

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

        $(localThis).closest(".shcart-item").remove();

        let RemovedItem = localThis.closest("li").childNodes[7].innerHTML;
        ArrayOfBookIds = ArrayOfBookIds.filter((item) => item !== RemovedItem);

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
        let quantityAfterRemQuan =
          parseInt(currentQuantity.match(/\d+/)[0]) - 1;
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
      let quantityAfterRemQuan = parseInt(currentQuantity.match(/\d+/)[0]) + 1;
      $(this)
        .closest(".shcart-item")
        .find(".item-quantity")
        .text("Quantity: " + quantityAfterRemQuan.toString());

      CalculateShoppingCartTotal();
      CalculateShcartBadge();
      CheckIfShcartEmpty();
      showShoppingCart();
    }

    document.getElementsByClassName("addQuan").forEach((element) => {
      element.onclick = AddQuantity;
    });
  }
});

function createNewShcartItem(savedThis) {
  const ClickDivViewOverlay = $(savedThis).parent().parent().children()[0];
  const ClickDivCardBody = $(savedThis).parent().parent().children()[1];

  // console.log(ClickDivCardBody.childNodes);

  const srcOfImage = ClickDivViewOverlay.childNodes[3].getAttribute("src");
  const cardTitle = ClickDivCardBody.childNodes[3].innerHTML;
  const cardPrice = ClickDivCardBody.childNodes[9].innerHTML;

  const mainListItem = document.createElement("li");
  mainListItem.classList.add("shcart-item");

  //delete Span
  const deleteSpan = document.createElement("span");
  deleteSpan.classList.add("bookDeleteTooltip");
  deleteSpan.innerHTML = "Delete";

  //Book Image
  const bookImage = document.createElement("img");
  bookImage.setAttribute("src", srcOfImage);
  bookImage.setAttribute("alt", cardTitle);

  //Book Title
  const bookTitle = document.createElement("span");
  bookTitle.classList.add("item-name");
  if (cardTitle.length > 30) {
    let titlePart = cardTitle.substring(0, 30);
    titlePart += "...";
    bookTitle.innerHTML = titlePart;
  } else {
    bookTitle.innerHTML = cardTitle;
  }

  //Book Price
  const bookPrice = document.createElement("span");
  bookPrice.classList.add("item-price");
  bookPrice.innerHTML = cardPrice;

  //Book Quantity
  const bookQuantity = document.createElement("span");
  bookQuantity.classList.add("item-quantity");
  bookQuantity.innerHTML = "Quantity: 1";

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
  bookHiddenId.innerHTML = ClickDivCardBody.childNodes[11].innerHTML;

  mainListItem.append(deleteSpan, bookImage);
  mainListItem.appendChild(bookTitle);
  mainListItem.appendChild(bookPrice);
  mainListItem.appendChild(bookQuantity);
  mainListItem.append(bookQuantityMinus, bookQuantityPlus);
  mainListItem.appendChild(bookHiddenId);

  shoppingCartItemsId.appendChild(mainListItem);
}

function CheckIfBookAlreadyInCart(savedThis) {
  const DivCardBody = $(savedThis).parent().parent().children()[1];

  if (ArrayOfBookIds.includes(DivCardBody.childNodes[11].innerHTML)) {
    //Book Already in Cart!
    alert("Book Already in Cart!");
    // savedThis.classList.add("animated");
    // savedThis.classList.add("heartBeat");
    // setTimeout(() => {
    //   savedThis.classList.remove("animated");
    //   savedThis.classList.remove("heartBeat");
    // }, 900);
    return false;
  } else {
    //Book Not in Cart yet!
    ArrayOfBookIds.push(DivCardBody.childNodes[11].innerHTML);
    alert("Book added to Cart!");
    return true;
  }
}
