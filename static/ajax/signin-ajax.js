const form = document.querySelector("form"),
  submitForm = form.querySelector("button"),
  errorNotif = form.querySelector(".error-notif");

form.onsubmit = (event) => {
  event.preventDefault();
};

submitForm.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "signin1.php", true);

  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "You have successfully sign in.") {
          location.href = "index.php";
        } else {
          errorNotif.textContent = data;
          errorNotif.style.display = "block";
        }
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
};
