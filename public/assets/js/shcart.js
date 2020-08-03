// #shoppingCart.myTooltip: hover.myTooltiptext {
//   visibility: visible;
//   opacity: 1;
// }

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
}

function CheckForZeroQuantity(e) {
  let quantityArray = [];
  shcartQuantities.forEach((element) => {
    quantityArray.push(parseInt(element.innerHTML.match(/\d+/)[0]));
  });

  if (quantityArray.includes(0)) {
    document.getElementById("modalConfirmDeleteByRemQuan");

    $("#modalConfirmDeleteByRemQuan").modal({
      backdrop: "static",
      keyboard: false,
    });

    document.getElementById(
      "confirmDeleteShcartElementByRemQuanYes"
    ).onclick = function () {
      shoppingCartItems[quantityArray.indexOf(0)].parentNode.removeChild(
        shoppingCartItems[quantityArray.indexOf(0)]
      );
    };

    document.getElementById(
      "confirmDeleteShcartElementByRemQuanNo"
    ).onclick = function () {
      shoppingCartItems[quantityArray.indexOf(0)].childNodes[11].click();
    };
  }
}

CheckForZeroQuantity();

$(".remQuan").click(function (e) {
  e.preventDefault();

  let currentQuantity = $(this)
    .closest(".shcart-item")
    .find(".item-quantity")
    .text();
  let quantityAfterRemQuan = parseInt(currentQuantity.match(/\d+/)[0]) - 1;
  $(this)
    .closest(".shcart-item")
    .find(".item-quantity")
    .text("Quantity: " + quantityAfterRemQuan.toString());

  CheckForZeroQuantity();
  CalculateShoppingCartTotal();
  CalculateShcartBadge();
  CheckIfShcartEmpty();
  showShoppingCart();
});

$(".addQuan").click(function (e) {
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
});

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

    CalculateShoppingCartTotal();
    CalculateShcartBadge();
    CheckIfShcartEmpty();
  };

  showShoppingCart();
}

$(".bookDeleteTooltip").click(DeleteElementFromShcart);
