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

  // console.log(shcartPricesArray);
  // console.log(shcartQuantitiesArray);

  let shcartTotalSum = 0;

  for (let i = 0; i < shcartPricesArray.length; i++) {
    shcartTotalSum += shcartPricesArray[i] * shcartQuantitiesArray[i];
  }

  // console.log(shcartTotalSum);
  // console.log("$" + shcartTotalSum.toFixed(2).toString());
  shcartTotal.innerHTML = "$" + shcartTotalSum.toFixed(2).toString();
}

CalculateShoppingCartTotal();

function CalculateShcartBadge() {
  let quanArray = [];
  shcartQuantities.forEach((element) => {
    quanArray.push(parseInt(element.innerHTML.match(/\d+/)[0]));
  });

  const reducer = (accumulator, currentValue) => accumulator + currentValue;

  let badgeSum = quanArray.reduce(reducer);

  if (badgeSum < 100) {
    shcartBadge.innerHTML = badgeSum.toString();
  } else {
    shcartBadge.innerHTML = "99+";
  }
}

CalculateShcartBadge();

shcartQuantities.forEach(function (element) {
  element.addEventListener("change", function () {
    alert("he");
  });
});

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

  CalculateShoppingCartTotal();
  CalculateShcartBadge();
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
  showShoppingCart();
});

$(".bookDeleteTooltip").click(function (e) {
  e.preventDefault();

  let currentQuantity = $(this).closest(".shcart-item").remove();

  CalculateShoppingCartTotal();
  CalculateShcartBadge();
  showShoppingCart();
});
