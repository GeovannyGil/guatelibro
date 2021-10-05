const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const formLogin = document.getElementById('formLogin');
const login_member = document.getElementById('login_member');


signUpButton.addEventListener('click', () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
  container.classList.remove("right-panel-active");
});



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
        Swal.fire({
          icon: json.type_message,
          title: json.title,
          text: json.message,
        }).then((response) => {
          if (response.isConfirmed === true) {
            window.location.href = 'http://localhost/guatelibro/ver/bibliotecadigital';
          }
        })
      } else {
        Swal.fire({
          icon: json.type_message,
          title: json.title,
          text: json.message,
        })
      }
    }
  }
  xhr.send(formData);

  // var formData = new FormData(document.getElementById('form-loginL'));
  // $('#loading-screen').css('display', 'block');
  // $.ajax({
  //   type: "POST",
  //   url: "http://localhost/sistema_zapateria_venta/Verificar/usuario",
  //   data: formData,
  //   cache: false,
  //   contentType: false,
  //   processData: false

  // }).done(function (response) {
  //   var mensaje = JSON.parse(response);
  //   $('#loading-screen').css('display', 'none');
  //   if (mensaje == "Correo o Contraseña incorrecta") {
  //     swal({
  //       title: 'Atención',
  //       text: mensaje,
  //       icon: 'error'
  //     }).then(function () {
  //       window.location.href = 'http://localhost/sistema_zapateria_venta/Ver/login';
  //     });
  //   }
  //   if (mensaje == "Esta cuenta no ha sido activada, vaya a su correo y dele click en el enlace") {
  //     swal({
  //       title: 'Atención',
  //       text: mensaje,
  //       icon: 'info'
  //     }).then(function () {
  //       window.location.href = 'http://localhost/sistema_zapateria_venta/Ver/login';
  //     });
  //   }
  //   if (mensaje == "Bienvenido") {
  //     swal({
  //       title: 'Atención',
  //       text: mensaje,
  //       icon: 'success'
  //     }).then(function () {
  //       window.location.href = 'http://localhost/sistema_zapateria_venta/Ver/dashboard';
  //     });
  //   }
  // });

}

login_member.addEventListener('click', (e) => {
  e.preventDefault();
  ingresar_usuario();
});

