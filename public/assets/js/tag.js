// console.log("asd");

// console.log(document.getElementsByClassName("tagTextSpan"));

const mainInput = document.getElementById("tagsInput");
const tagContainer = document.getElementById("divTagContainer");

mainInput.addEventListener("keypress", function (e) {
  if (e.code === "Enter" || e.code === "Comma") {
    let message = mainInput.value;

    if (!message.replace(/\s/g, "").length) {
      mainInput.value = "";

      setTimeout(function () {
        mainInput.value = "";
      }, 0);
    } else {
      message.trim();

      message = message + " ";

      let firstSpan = document.createElement("span");
      firstSpan.classList.add("tag");

      let secondSpan = document.createElement("span");
      secondSpan.classList.add("tagTextSpan");
      secondSpan.appendChild(document.createTextNode(message));

      let closeIcon = document.createElement("i");
      closeIcon.classList.add("closeTagIcon");
      closeIcon.classList.add("fas");
      closeIcon.classList.add("fa-times");

      secondSpan.appendChild(closeIcon);

      firstSpan.appendChild(secondSpan);

      tagContainer.appendChild(firstSpan);
      tagContainer.innerHTML += "&nbsp;";

      mainInput.value = "";

      setTimeout(function () {
        mainInput.value = "";
      }, 0);
    }
  }
});
