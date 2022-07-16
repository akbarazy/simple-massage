const otherPeople = document.querySelector(".other-people");
let xhr = new XMLHttpRequest();
xhr.open("POST", "index1.php", true);

xhr.onload = () => {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      let data = xhr.response;
      otherPeople.innerHTML = data;
    }
  }
};
xhr.send();
