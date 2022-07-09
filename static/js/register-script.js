const label = document.querySelector("label");
const input = document.querySelector("input");

input.addEventListener("focus", function () {
  label.classList.add("label-animation");
});

input.addEventListener("focusout", function () {
  const inputValue = input.value.trim();
  if (inputValue === "") {
    label.classList.remove("label-animation");
  }
  if (inputValue) {
    label.classList.add("label-animation");
  }
});
