const contactSubmitButton = document.getElementById("contactFormSubmitButton");
const submitArrow = document.getElementById("submitArrow");

contactSubmitButton.addEventListener("mouseover", moveSubmitButtonArrowToRight);
contactSubmitButton.addEventListener("mouseout", moveSubmitButtonArrowToLeft);

function moveSubmitButtonArrowToRight() {
  submitArrow.style.cssText = "transform: translate(10px, 0);";
}

function moveSubmitButtonArrowToLeft() {
  submitArrow.style.cssText = "";
}
