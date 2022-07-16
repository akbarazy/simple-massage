const form = document.querySelector("form"),
  inputChat = document.querySelector(".input-chat"),
  sendButton = form.querySelector("button"),
  allChat = document.querySelector(".all-chat");

form.onsubmit = (event) => {
  event.preventDefault();
};

sendButton.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "add-chat.php", true);

  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputChat.value = "";
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "chat1.php", true);

  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        allChat.innerHTML = data;
      }
    }
  };

  let formData = new FormData(form);
  console.log(formData);
  xhr.send(formData);
}, 500);
