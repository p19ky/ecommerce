window.onload = () => {
  navbarLinksResizer();
  showShoppingCart();

  // setTimeout(() => {
  //   CheckIfShcartEmpty();
  //   CalculateShoppingCartTotal();
  //   CalculateShcartBadge();
  // }, 100);
};
window.onresize = () => {
  navbarLinksResizer();
};
