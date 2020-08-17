function HomepageMarginizer() {
  if (document.body.contains(document.getElementById("homepageMain"))) {
    document.body.setAttribute("style", "margin:auto 0px");
    document
      .getElementById("mainFooter")
      .setAttribute("style", "margin:auto 25px");
  } else {
    document.body.setAttribute("style", "margin:auto 25px");
  }
}
HomepageMarginizer();
