const btnLogin = document.getElementById('btnLogin');
const btnSupport = document.getElementById('btnSupport');
const formLogin = document.getElementById('form-login');
const in_password = document.getElementById('password');

formLogin.addEventListener('submit', (e) => {
  e.preventDefault();
  let formData = new FormData(formLogin);

  if (formData.get('user') === '' || formData.get('password') === '') {
    console.log("El usuario y la contraseña son obligatorias");
  } else {
    if (formData.get('user') == 'admin' && formData.get('password') == 'watsy') {
      window.location = "http://localhost:3000/login-admin.html";
    } else if (formData.get('user') != 'admin' && formData.get('password') != 'watsy') {
      console.log('Credenciales invalidas');
    }
  }
});


btnSupport.onclick = () => {
  console.log("Soporte");
}


const btn_show_password = document.getElementById('show_password');

function watchPassword(input) {
  if (input.type == "password") {
    input.type = "text";
    $('.inputShowPassword').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  } else {
    input.type = "password";
    $('.inputShowPassword').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }
}

btn_show_password.onclick = () => {
  watchPassword(in_password);
}