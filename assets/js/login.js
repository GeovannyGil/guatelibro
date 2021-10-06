const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const formLogin = document.getElementById('formLogin');
const login_member = document.getElementById('login_member');
//Register
const formRegister = document.getElementById('formRegister');
const register_member = document.getElementById('register_member');



signUpButton.addEventListener('click', () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
  container.classList.remove("right-panel-active");
});

//Toast
const Toast = Swal.mixin({
  toast: true,
  position: 'bottom-start',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

function ingresar_usuario() {
  let formData = new FormData(formLogin);
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/guatelibro/Verificar/usuario', true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var resultado = xhr.responseText;
      console.log(resultado);
      var json = JSON.parse(resultado);
      console.log(json);
      if (json.type_message == "success") {
        Toast.fire({
          icon: json.type_message,
          title: json.message
        })
        setTimeout(() => {
          window.location.href = 'http://localhost/guatelibro/ver/bibliotecadigital';
        }, 1000)
        // Swal.fire({
        //   icon: json.type_message,
        //   title: json.title,
        //   text: json.message,
        // }).then((response) => {
        //   if (response.isConfirmed === true) {
        //     window.location.href = 'http://localhost/guatelibro/ver/bibliotecadigital';
        //   }
        // })
      } else {
        Toast.fire({
          icon: json.type_message,
          title: json.message
        })
      }
    }
  }
  xhr.send(formData);
}

login_member.addEventListener('click', (e) => {
  e.preventDefault();
  ingresar_usuario();
});

function verificar_correo() {
  let emailRegister = document.getElementById('email_memberR');
  let passwordRegister = document.getElementById('passwordR');
  let formData = new FormData(formRegister);
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/guatelibro/Verificar/verificar_correo', true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var resultado = xhr.responseText;
      console.log(resultado);
      var json = JSON.parse(resultado);
      console.log(json);
      if (json.email === "user_not_found") {
        var xhr2 = new XMLHttpRequest();
        xhr2.open('POST', 'http://localhost/guatelibro/Verificar/register_usuario', true);
        xhr2.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr2.onreadystatechange = function () {
          if (xhr2.readyState == 4 && xhr2.status == 200) {
            var resultado = xhr2.responseText;
            console.log(resultado);
            var json = JSON.parse(resultado);
            console.log(json);
            if (json.icon == "success") {
              Toast.fire({
                icon: json.icon,
                title: json.message
              })
              document.getElementById('email_member').value = emailRegister.value;
              document.getElementById('password_member').value = passwordRegister.value;
              formRegister.reset();
              signInButton.click();
            } else {
              Toast.fire({
                icon: json.icon,
                title: json.message
              })
            }
          }
        }
        xhr2.send(formData);
      } else {
        Toast.fire({
          icon: "error",
          title: "Ya existe un usuario usando este correo"
        })
      }
    }
  }
  xhr.send(formData);
}

register_member.onclick = (e) => {
  e.preventDefault();
  verificar_correo();
};

