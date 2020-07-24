//MDN default js ?
// new WOW().init();

function navbarLinksResizer() {
  //This function adds or removes classes from the navbar collapsable links part.
  // Get the width of the viewport
  const width =
    window.innerWidth ||
    document.documentElement.clientWidth ||
    document.body.clientWidth;

  //links from the navbar
  const links = document.getElementById("navbarSupportedContent");

  if (width < 992) {
    links.classList.remove("d-flex");
    links.classList.remove("justify-content-end");
  }
  if (width > 992) {
    links.classList.add("d-flex");
    links.classList.add("justify-content-end");
  }
}

$('[data-toggle="tooltip"]').tooltip({
  template:
    '<div class="tooltip tooltip-custom"><div class="title"></div><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
});

function skewer() {
  if (
    document.getElementById("collapsedToggleButton").style.cssText ===
    "transform: skew(-0.06turn, 18deg);"
  ) {
    document.getElementById("collapsedToggleButton").style.transform =
      "skew(0)";
  } else {
    document.getElementById("collapsedToggleButton").style.transform =
      "skew(-0.06turn, 18deg)";
  }
}

document
  .getElementById("collapsedToggleButton")
  .addEventListener("click", skewer);

window.onload = function () {
  navbarLinksResizer();
};
window.onresize = function () {
  navbarLinksResizer();
};
