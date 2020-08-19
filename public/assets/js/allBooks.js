$(document).ready(function () {
  if (
    document.body.contains(document.getElementById("allBooksMainContainer"))
  ) {
    const $valueSpanMin = $(".valueSpanMin");
    const $valueMin = $("#customRangeMin");
    const $minPriceFilterInput = $("#minPriceFilterInput");
    const $valueSpanMax = $(".valueSpanMax");
    const $valueMax = $("#customRangeMax");
    const $maxPriceFilterInput = $("#maxPriceFilterInput");

    //Initialize Min-Max Property -> MIN ALWAYS < THEN MAX
    $valueMin[0].max = $valueMax.val();
    $valueMax[0].min = $valueMin.val();

    //Min Range - Start

    $valueSpanMin.html("$" + $valueMin.val());
    $valueMin.on("input change", () => {
      $valueSpanMin.html("$" + $valueMin.val());
      $valueMax[0].min = $valueMin.val();
    });

    $minPriceFilterInput.on("input change", () => {
      $valueMin.val($minPriceFilterInput.val());
      $valueSpanMin.html("$" + $valueMin.val());
      $valueMax[0].min = $valueMin.val();
    });

    //Min Range - End

    //Max Range - Start

    $valueSpanMax.html("$" + $valueMax.val());
    $valueMax.on("input change", () => {
      $valueSpanMax.html("$" + $valueMax.val());
      $valueMin[0].max = $valueMax.val();
    });

    $maxPriceFilterInput.on("input change", () => {
      $valueMax.val($maxPriceFilterInput.val());
      $valueSpanMax.html("$" + $valueMax.val());
      $valueMin[0].max = $valueMax.val();
    });

    //Max Range - End
  }
});

CheckIfWishlistIsEmpty();

function allBooksUpperFilterButtons() {
  if (window.innerWidth < 902) {
  }
}
