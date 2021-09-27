
const btnUser = document.querySelectorAll('div.user');

for (let i = 0; i < btnUser.length; i++) {
  btnUser[i].addEventListener("click", function () {
    console.log(`Bienvenido ${btnUser[i].parentElement.nextElementSibling.children[0].innerText}`);
    window.location = "index.html";
  });
}

