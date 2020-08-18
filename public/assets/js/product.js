document
  .getElementsByClassName("addToCartFromProductPage")
  .forEach((element) => {
    element.addEventListener("click", () => {
      console.log(element);
    });
  });
