const mainInput = document.getElementById("tagsInput");
const tagContainer = document.getElementById("divTagContainer");

let advancedSearchTagsArray = [];

addClickEventForTagCloser();

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

      let lowercaseMessage = message.toLowerCase();

      if (!advancedSearchTagsArray.includes(lowercaseMessage)) {
        advancedSearchTagsArray.push(lowercaseMessage);

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

        addClickEventForTagCloser();

        mainInput.value = "";

        setTimeout(function () {
          mainInput.value = "";
        }, 0);
      }
    }
  }
});

function labelChanger() {
  document.getElementById("tagsInputLabel").innerText =
    "Press 'comma' or 'enter' to add tag!";
}

function labelChangerToDefault() {
  document.getElementById("tagsInputLabel").innerText = "Tags";
}

mainInput.onfocus = labelChanger;

function addClickEventForTagCloser() {
  document.querySelectorAll(".closeTagIcon").forEach((item) => {
    item.addEventListener("click", (event) => {
      let lowCaseMessage = item
        .closest("span.tag")
        .innerText.trimEnd()
        .toLowerCase();
      let isMessage = (el) => el === lowCaseMessage;
      let deleteMeIndex = advancedSearchTagsArray.findIndex(isMessage);
      advancedSearchTagsArray.splice(deleteMeIndex, 1);
      item.closest("span.tag").remove();
    });
  });
}
