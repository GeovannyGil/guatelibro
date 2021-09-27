//Phones
const btn_add_phone = document.getElementById("btn_add_phone");
const btn_delete_phone = document.getElementById('btn_delete_phone');
const space_phone = document.getElementById('space_phones');
const in_phone_collaborator = document.getElementById('phone_collaborator');

//Direction
const btn_add_direction = document.getElementById('btn_add_direction');
const btn_delete_direction = document.getElementById('btn_delete_direction');
const space_direction = document.getElementById('space_direction');
const in_direction_collaborator = document.getElementById('direction_collaborator');

//Select2
const selectRol = document.getElementById('rol');

//Inputs
const in_nit_collaborator = document.getElementById('nit_input');
const in_code_collaborator = document.getElementById('code_collaborator');
const in_name_collaborator = document.getElementById('name_collaborator');
const in_surname_collaborator = document.getElementById('surname_collaborator');
const in_email_collaborator = document.getElementById('email_collaborator');

//users
const in_user_collaborator = document.getElementById('user_collaborator');
const in_password_collaborator = document.getElementById('password_collaborator');
const imgAvatarUser = document.getElementById('imgAvatarUser');
//Actions
const btn_add_collaborator = document.getElementById('add_collaborator');
const btn_update_collaborator = document.getElementById('update_collaborator');
const btn_select_avatar = document.getElementById('btn_modal_avatar');
const btn_clean_inputs = document.getElementById('clean_inputs');

//form
const formCollaborator = document.getElementById('form-collaborators');
//Arrays
let urlImg = "";
let list_phones = [];
let list_direction = [];
let $id = 0;

//Funciones de Teléfonos
btn_add_phone.onclick = () => {
  addPhoneCollaborator(in_phone_collaborator.value);
  in_phone_collaborator.value = '';
}

const addPhoneCollaborator = (number) => {
  //Phone exist
  let phone_issets = false;
  //Search, if isset the phone in the object
  list_phones.forEach((element) => {
    if (element == number) {
      phone_issets = true;
    }
  });

  if (list_phones.length < 3) {
    if (phone_issets === false) {
      if (number !== '') {
        //Add array
        list_phones.push(number);
        //Creacion de elemento html
        let spanBadge = document.createElement("SPAN");
        //Agregar 
        spanBadge.innerText = number;
        spanBadge.classList.add("right", "badge_e", "badge", "badge_transparent_watsy", "font-watsy", "mx-1", "fs-1", "my-1")
        spanBadge.onclick = () => {
          in_phone_collaborator.value = spanBadge.innerHTML;
          btn_add_phone.classList.add("disabled");
          btn_delete_phone.removeAttribute("disabled");
        };
        space_phone.appendChild(spanBadge);
        btn_delete_phone.setAttribute("disabled", "disabled");
        console.log(list_phones);
      } else {
        Toast.fire({
          icon: 'warning',
          title: 'El teléfono no puede estar vacio'
        })
      }
    } else {
      Toast.fire({
        icon: 'warning',
        title: 'Teléfono existente'
      })
    }
  } else {
    Toast.fire({
      icon: 'warning',
      title: 'Solo 3 teléfonos por colaborador'
    })
  }
}

btn_delete_phone.onclick = (e) => {
  e.preventDefault();
  if (list_phones.length !== 0) {
    deleteObject("space_phones", in_phone_collaborator);
    list_phones = list_phones.filter((element) => {
      return element !== in_phone_collaborator.value;
    });
    btn_delete_phone.setAttribute("disabled", "disabled");
    btn_add_phone.classList.remove("disabled");
    in_phone_collaborator.value = '';
    console.log(list_phones);
  } else {
    Toast.fire({
      icon: 'warning',
      title: 'No hay ninguna dirección por eliminar'
    })
  }
}



//Funciones de Direcciones
btn_add_direction.onclick = () => {
  addDirectionCollaborator(in_direction_collaborator.value);
  in_direction_collaborator.value = '';
}

const addDirectionCollaborator = (direction) => {
  //Phone exist
  let direction_issets = false;
  //Search, if isset the phone in the object
  list_direction.forEach((element) => {
    if (element == direction) {
      direction_issets = true;
    }
  });

  if (list_direction.length < 3) {
    if (direction_issets === false) {
      if (direction !== '') {
        let municipioSelect = selectMunDireccion.options[selectMunDireccion.selectedIndex].text;
        let depapartamentSelect = selectDpaDireccion.options[selectDpaDireccion.selectedIndex].text;
        let directionComplete = `${direction} | ${municipioSelect}, ${depapartamentSelect}`
        //Add array
        list_direction.push(directionComplete);
        //Creacion de elemento html
        let spanBadge = document.createElement("SPAN");
        //Agregar Texto
        spanBadge.innerText = directionComplete;
        spanBadge.classList.add("right", "badge_e", "badge", "badge_transparent_watsy", "font-watsy", "mx-1", "fs-1", "my-1")
        spanBadge.onclick = () => {
          //Obtener solo la direccion
          // let arrayDirection = spanBadge.innerText.split("|");
          // let direction = arrayDirection[0].slice(0, arrayDirection[0].length - 1);
          in_direction_collaborator.value = directionComplete;
          //    obtener departamento y municipio
          // let arrayDP = arrayDirection[1].split(',');
          // let departamento = arrayDP[1].slice(1, arrayDP[1].length);
          // console.log(departamento);
          // let municipio = arrayDP[0].slice(1, arrayDP[0].length);
          // buscarSelectDpa(selectDpaDireccion, departamento, selectMunDireccion);
          // spanSelectDpa.innerText = departamento;
          // seleccionarInSelect(selectMunDireccion, municipio);
          btn_add_direction.classList.add("disabled");
          btn_delete_direction.removeAttribute("disabled");
        };
        space_direction.appendChild(spanBadge);
        btn_delete_direction.setAttribute("disabled", "disabled");
        console.log(list_direction);
      } else {
        Toast.fire({
          icon: 'warning',
          title: 'La dirección no puede estar vacia'
        })
      }
    } else {
      Toast.fire({
        icon: 'warning',
        title: 'Dirección existente'
      })
    }
  } else {
    Toast.fire({
      icon: 'warning',
      title: 'Solo 3 direcciones por colaborador'
    })
  }
}


btn_delete_direction.onclick = (e) => {
  e.preventDefault();
  if (list_direction.length !== 0) {
    deleteObject("space_direction", in_direction_collaborator);
    list_direction = list_direction.filter((element) => {
      return element !== in_direction_collaborator.value;
    });
    btn_delete_direction.setAttribute("disabled", "disabled");
    btn_add_direction.classList.remove("disabled");
    in_direction_collaborator.value = '';
    console.log(list_direction);
  } else {
    Toast.fire({
      icon: 'warning',
      title: 'No hay ninguna dirección por eliminar'
    })
  }
}

//funciones compartidas
const deleteObject = (elementHtml, input) => {
  let elementHTML = document.querySelectorAll(`#${elementHtml} .badge`);
  for (let i = 0; i < elementHTML.length; i++) {
    if (input.value == elementHTML[i].innerText) {
      elementHTML[i].remove();
    }
  }
}

//Acciones
btn_add_collaborator.onclick = () => {
  if (in_name_collaborator.value !== '' && in_surname_collaborator.value !== '' && in_code_collaborator.value !== '' && in_user_collaborator.value !== '' && in_password_collaborator.value !== '' && selectRol.options[selectRol.selectedIndex].value !== '') {
    Swal.fire(
      '¡Agregado(a) Exitosamente!',
      'Colaborador agregado con éxito',
      'success'
    ).then
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Obligatorio',
      text: 'Los campos de codigo, nombre(s), apellido(s), puesto, usuario y contraseña del colaborador son necesarios'
    }).then((response) => {
      console.log(response);
    })
  }
}

btn_update_collaborator.onclick = () => {
  if (in_name_collaborator.value !== '' && in_surname_collaborator.value !== '' && in_code_collaborator.value !== '' && in_user_collaborator.value !== '' && in_password_collaborator.value !== '' && selectRol.options[selectRol.selectedIndex].value !== '') {
    Swal.fire(
      '¡Actualizado(a) Exitosamente!',
      'Colaborador actualilzado con éxito',
      'success'
    ).then
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Obligatorio',
      text: 'Los campos de codigo, nombre(s), apellido(s), usuario y contraseña del colaborador son necesarios'
    }).then((response) => {
      console.log(response);
    })
  }
}

const update_collaborator = (code_collaborator) => {
  btn_add_collaborator.classList.toggle('hide');
  btn_update_collaborator.classList.toggle('hide');
  btn_clean_inputs.classList.toggle('hide');
  let fila = document.querySelector("#collaborator_data_" + code_collaborator);
  $id = code_collaborator;
  in_name_collaborator.value = fila.children[1].innerText;
  in_surname_collaborator.value = fila.children[2].innerText;
  in_nit_collaborator.value = fila.children[3].innerText;
  in_code_collaborator.value = fila.children[4].innerText;
  in_user_collaborator.value = fila.children[5].innerText;
  in_password_collaborator.value = "HASH";
  //Select in select2
  $(selectRol).val(fila.children[7].innerText);
  $(selectRol).trigger('change');
  in_email_collaborator.value = fila.children[8].innerText;
  const spanDirection = fila.children[9].children;
  for (let i = 0; i < spanDirection.length; i++) {
    addDirectionCollaborator(spanDirection[i].innerText);
  }
  const spanPhones = fila.children[10].children;
  for (let i = 0; i < spanPhones.length; i++) {
    addPhoneCollaborator(spanPhones[i].innerText);
  }
  $('html, body').animate({
    scrollTop: $(formCollaborator).offset().top - 200
  }, 600);
}

const delete_collaborator = (code_collaborator) => {
  Swal.fire(
    '¡Eliminado(a) Exitosamente!',
    'Colaborador eliminado con éxito',
    'success'
  ).then
}

btn_clean_inputs.onclick = () => {
  clean_inputs();
}

const clean_inputs = () => {
  imgAvatarUser.setAttribute('src', './img/login-admin/defaultUser.png');
  in_nit_collaborator.value = "";
  in_code_collaborator.value = "";
  in_name_collaborator.value = "";
  in_surname_collaborator.value = "";
  in_email_collaborator.value = "";
  space_phone.innerHTML = "";
  space_direction.innerHTML = '';
  list_phones = [];
  list_direction = [];
  in_user_collaborator.value = '';
  in_password_collaborator.value = '';
  btn_add_collaborator.classList.toggle('hide');
  btn_update_collaborator.classList.toggle('hide');
  btn_clean_inputs.classList.toggle('hide');
}

btn_select_avatar.onclick = (e) => {
  e.preventDefault();
  const avataresPredefinidos = document.querySelectorAll('div.content-avatar-user');
  for (let i = 0; i < avataresPredefinidos.length; i++) {
    avataresPredefinidos[i].children[0].children[0].addEventListener('click', () => {
      let imgAvatar = avataresPredefinidos[i].children[0].children[0];
      let imgUrlAvat = imgAvatar.getAttribute('src');
      imgAvatarUser.setAttribute('src', imgUrlAvat);
      urlImg = imgUrlAvat;
      $('#modalAvatars').modal('hide');
    });
  }
}

//Validaciones
// NIT DEFAULT "CF"

//Code Collaborator Require Number
in_code_collaborator.onkeypress = (event) => {
  if (event.charCode >= 48 && event.charCode <= 57) {
    return true;
  }
  return false;
}


const disabledButton = (input, btn, validate) => {
  if (input.value == validate) {
    btn.setAttribute("disabled", "disabled");
  } else {
    btn.removeAttribute('disabled');
  }
}

in_phone_collaborator.onkeyup = () => {
  disabledButton(in_phone_collaborator, btn_delete_phone, '');
  if (in_phone_collaborator.value === '') {
    btn_add_phone.classList.remove("disabled");
  }
}

in_direction_collaborator.onkeyup = () => {
  disabledButton(in_direction_collaborator, btn_delete_direction, '');
  if (in_direction_collaborator.value === '') {
    btn_add_direction.classList.remove("disabled");
  }
}

// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function () {
  window.stepper = new Stepper(document.querySelector('.bs-stepper'))
});

const nextBStepper = document.getElementById('bs-stepper-next');

nextBStepper.onclick = () => {
  stepper.next();
  $('html, body').animate({
    scrollTop: $(formCollaborator).offset().top - 200
  }, 600);
};

//password
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
  watchPassword(in_password_collaborator);
}

