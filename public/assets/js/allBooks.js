const addToWishlistHeartIconLink = document.getElementsByClassName(
  "addToWishlistHeartIconLink"
);

const addToWishlistHeartIcon = document.getElementsByClassName(
  "addToWishlistHeartIcon"
);

const heartClicker = document.getElementsByClassName("heartClicker");

// console.log(addToWishlistHeartIconLink.style);
//
// function addBookToWishlistAndRedHeartSwitch() {
//   console.log(this);
//   if (addToWishlistHeartIcon.style.color === "") {
//     addToWishlistHeartIcon.style.color = "red";
//     addToWishlistHeartIcon.classList.remove("far");
//     addToWishlistHeartIcon.classList.remove("fa-heart");
//     addToWishlistHeartIcon.classList.add("fas");
//     addToWishlistHeartIcon.classList.add("fa-heart");
//     addToWishlistHeartIconLink.style.background = "transparent";
//     addToWishlistHeartIconLink.style.opacity = "1";
//   } else {
//     addToWishlistHeartIcon.style.color = "";
//     addToWishlistHeartIcon.classList.remove("fas");
//     addToWishlistHeartIcon.classList.remove("fa-heart");
//     addToWishlistHeartIcon.classList.add("far");
//     addToWishlistHeartIcon.classList.add("fa-heart");
//     addToWishlistHeartIconLink.style.background = "#777676";
//     addToWishlistHeartIconLink.style.opacity = "0.5";
//   }
// }

addToWishlistHeartIconLink.forEach(function (element) {
  element.addEventListener("click", function () {
    // console.log(this.firstChild.nextSibling);
    // this.firstChild.nextSibling.style.color = "red";

    const icon = this.firstChild.nextSibling;

    if (icon.style.color === "") {
      icon.style.color = "red";
      icon.classList.remove("far");
      icon.classList.remove("fa-heart");
      icon.classList.add("fas");
      icon.classList.add("fa-heart");
      this.style.background = "transparent";
      this.style.opacity = "1";
    } else {
      icon.style.color = "";
      icon.classList.remove("fas");
      icon.classList.remove("fa-heart");
      icon.classList.add("far");
      icon.classList.add("fa-heart");
      this.style.background = "#777676";
      this.style.opacity = "0.5";
    }
  });
});

$(".addToWishlistHeartIconLink")
  .mouseenter(function () {
    if (this.firstChild.nextSibling.style.color === "") {
      this.style.opacity = "0.9";
    }
  })
  .mouseleave(function () {
    if (this.firstChild.nextSibling.style.color === "") {
      this.style.opacity = "0.5";
    }
  });

$(document).ready(function () {
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
});
