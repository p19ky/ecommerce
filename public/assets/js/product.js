document
  .getElementsByClassName("addToCartFromProductPage")
  .forEach((element) => {
    element.addEventListener("click", () => {
      let bookId, bookImage, bookTitle, bookAuthor, bookPrice, bookGenre;

      const mainContainer =
        element.parentElement.parentElement.parentElement.parentElement;

      $(mainContainer)
        .find(".hiddenDivWithInformations")
        .children()
        .each((key, value) => {
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookId")) {
              bookId = value.innerHTML;
            }
          }
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookImage")) {
              bookImage = value.innerHTML;
            }
          }
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookTitle")) {
              bookTitle = value.innerHTML;
            }
          }
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookAuthor")) {
              bookAuthor = value.innerHTML;
            }
          }
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookPrice")) {
              bookPrice = value.innerHTML;
            }
          }
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookGenre")) {
              bookGenre = value.innerHTML;
            }
          }
        });

      if (!CheckIfBookAlreadyInCart(bookId)) {
        ARRAYOFBOOKSINSHCART.push({
          idBook: bookId,
          imageBook: bookImage,
          titleBook: bookTitle,
          authorBook: bookAuthor,
          priceBook: bookPrice,
          quantityBook: "Quantity: 1",
          genreBook: bookGenre,
        });

        ARRAYOFUSERSWITHSHOPPINGCART.forEach((person) => {
          if ("idUser" in person) {
            if (person["idUser"] === currentUserId) {
              if ("ARRAYOFBOOKSINSHCART" in person) {
                person["ARRAYOFBOOKSINSHCART"] = ARRAYOFBOOKSINSHCART;
              }
            }
          }
        });

        localStorage.setItem(
          "ARRAYOFUSERSWITHSHOPPINGCART",
          JSON.stringify(ARRAYOFUSERSWITHSHOPPINGCART)
        );

        createNewShcartItem(
          bookId,
          bookImage,
          bookTitle,
          bookAuthor,
          bookPrice,
          "Quantity: 1",
          bookGenre
        );
        CalculateShoppingCartTotal();
        CalculateShcartBadge();
        CheckIfShcartEmpty();
        CheckHeightImage();

        ReloadDeleteAndRemAndAdd();
      }
    });
  });

document
  .getElementsByClassName("addToWishlistFromProductPage")
  .forEach((element) => {
    element.addEventListener("click", () => {
      let bookId, bookImage, bookTitle, bookAuthor, bookPrice, bookGenre;

      const mainContainer =
        element.parentElement.parentElement.parentElement.parentElement;

      $(mainContainer)
        .find(".hiddenDivWithInformations")
        .children()
        .each((key, value) => {
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookId")) {
              bookId = value.innerHTML;
            }
          }
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookImage")) {
              bookImage = value.innerHTML;
            }
          }
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookTitle")) {
              bookTitle = value.innerHTML;
            }
          }
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookAuthor")) {
              bookAuthor = value.innerHTML;
            }
          }
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookPrice")) {
              bookPrice = value.innerHTML;
            }
          }
          if (value.tagName === "DIV") {
            if (value.classList.contains("bookGenre")) {
              bookGenre = value.innerHTML;
            }
          }
        });

      let shouldIAddToWishlist = true;
      let idOfUser = "guest";

      if (
        document.body.contains(document.getElementById("hiddenCheckForAuth"))
      ) {
        idOfUser = document.getElementById("hiddenCheckForAuth").innerHTML;
      }

      ARRAYOFWISHLISTBOOKS.forEach((book) => {
        if (book["bookId"] === bookId) {
          shouldIAddToWishlist = false;
        }
      });

      if (shouldIAddToWishlist) {
        ARRAYOFWISHLISTBOOKS.push({
          bookId: bookId,
          title: bookTitle,
          author: bookAuthor,
          price: bookPrice,
          image: bookImage,
          genre: bookGenre,
        });

        ARRAYOFUSERSWITHWISHLISTBOOKS.forEach((person) => {
          if ("userId" in person) {
            if (person["userId"] === idOfUser) {
              person["ARRAYOFWISHLISTBOOKS"] = ARRAYOFWISHLISTBOOKS;
            }
          }
        });

        localStorage.setItem(
          "ARRAYOFUSERSWITHWISHLISTBOOKS",
          JSON.stringify(ARRAYOFUSERSWITHWISHLISTBOOKS)
        );

        CreateWishlistItem(
          bookId,
          bookImage,
          bookTitle,
          bookAuthor,
          bookPrice,
          bookGenre
        );

        reloadWishlistAddToCartButton();
        ReloadDeleteIconsForWishlist();

        alert(bookTitle + " added to Wishlist");
      } else {
        alert(bookTitle + " is already in your Wishlist!");
      }
    });
  });
