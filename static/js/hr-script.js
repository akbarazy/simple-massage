const hr = document.querySelectorAll("hr");
setInterval(function () {
  hr[0].classList.toggle("hr-color");
  hr[1].classList.toggle("hr-color");
}, 3000);
