// #shoppingCart.myTooltip: hover.myTooltiptext {
//   visibility: visible;
//   opacity: 1;
// }

const shoppingCartIcon = document.getElementById("shoppingCartIcon");
const shoppingCartTooltiptext = document
  .getElementById("shoppingCartIcon")
  .getElementsByClassName("shcartTooltiptext");

console.log(shoppingCartTooltiptext);

shoppingCartIcon.addEventListener("click", function () {
  Array.prototype.filter.call(shoppingCartTooltiptext, function (el) {
    if (el.style.visibility === "hidden" && el.style.opacity === "0") {
      el.style.visibility = "visible";
      el.style.opacity = "1";
    } else {
      el.style.visibility = "hidden";
      el.style.opacity = "0";
    }
  });
});
