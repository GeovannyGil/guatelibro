//Phones
const btn_add_phone = document.getElementById("btn_add_phone");
const btn_delete_phone = document.getElementById("btn_delete_phone");
const space_phone = document.getElementById("space_phones");
const in_phone_client = document.getElementById("phone_client");

//Direction
const btn_add_direction = document.getElementById("btn_add_direction");
const btn_delete_direction = document.getElementById("btn_delete_direction");
const space_direction = document.getElementById("space_direction");
const in_direction_client = document.getElementById("direction_client");
//Select2
const spanSelectDpa = document.getElementById('select2-dpaDireccion-container');

//Inputs
const in_nit_client = document.getElementById("nit_input");
const in_code_client = document.getElementById("code_client");
const in_name_client = document.getElementById("name_client");
const in_email_client = document.getElementById("email_client");

//Actions
const btn_add_client = document.getElementById("add_client");
const btn_update_client = document.getElementById("update_client");
const btn_clean_inputs = document.getElementById("clean_inputs");

//FORM
const formCliente = document.getElementById('form-cliente');

//Arrays
let list_phones = [];
let list_direction = [];
let $id = 0;

//Funciones de Teléfonos
btn_add_phone.onclick = () => {
  addPhoneClient(in_phone_client.value);
  in_phone_client.value = '';
}

const addPhoneClient = (number) => {
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
          in_phone_client.value = spanBadge.innerHTML;
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
      title: 'Solo 3 teléfonos por cliente'
    })
  }
}

btn_delete_phone.onclick = (e) => {
  e.preventDefault();
  if (list_phones.length !== 0) {
    deleteObject("space_phones", in_phone_client);
    list_phones = list_phones.filter((element) => {
      return element !== in_phone_client.value;
    });
    btn_delete_phone.setAttribute("disabled", "disabled");
    btn_add_phone.classList.remove("disabled");
    in_phone_client.value = '';
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
  addDirectionClient(in_direction_client.value);
  in_direction_client.value = '';
}

const addDirectionClient = (direction) => {
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
          in_direction_client.value = directionComplete;
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
      title: 'Solo 3 direcciones por cliente'
    })
  }
}


btn_delete_direction.onclick = (e) => {
  e.preventDefault();
  if (list_direction.length !== 0) {
    deleteObject("space_direction", in_direction_client);
    list_direction = list_direction.filter((element) => {
      return element !== in_direction_client.value;
    });
    btn_delete_direction.setAttribute("disabled", "disabled");
    btn_add_direction.classList.remove("disabled");
    in_direction_client.value = '';
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
btn_add_client.onclick = () => {
  if (in_name_client.value !== '' && in_code_client.value !== '') {
    Swal.fire(
      '¡Agregado(a) Exitosamente!',
      'Cliente agregado con éxito',
      'success'
    ).then
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Obligatorio',
      text: 'Los campos de codigo y nombre de cliente son necesarios'
    }).then((response) => {
      console.log(response);
    })
  }
}

btn_update_client.onclick = () => {
  if (in_name_client.value !== '' && in_code_client.value !== '') {
    Swal.fire(
      '¡Actualizado(a) Exitosamente!',
      'Cliente actualilzado con éxito',
      'success'
    ).then
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Obligatorio',
      text: 'Los campos de codigo y nombre de cliente son necesarios'
    }).then((response) => {
      console.log(response);
    })
  }
}

const update_client = (code_client) => {
  btn_add_client.classList.toggle('hide');
  btn_update_client.classList.toggle('hide');
  btn_clean_inputs.classList.toggle('hide');
  let fila = document.querySelector("#client_data_" + code_client);
  $id = code_client;
  in_nit_client.value = fila.children[1].innerText;
  in_code_client.value = fila.children[2].innerText;
  in_name_client.value = fila.children[3].innerText;
  in_email_client.value = fila.children[4].innerText;
  const spanPhones = fila.children[5].children;
  for (let i = 0; i < spanPhones.length; i++) {
    addPhoneClient(spanPhones[i].innerText);
  }
  const spanDirection = fila.children[6].children;
  for (let i = 0; i < spanDirection.length; i++) {
    addDirectionClient(spanDirection[i].innerText);
  }
  $('html, body').animate({
    scrollTop: $(formCliente).offset().top - 200
  }, 600);
}

const delete_client = (code_client) => {
  Swal.fire(
    '¡Eliminado(a) Exitosamente!',
    'Cliente eliminado con éxito',
    'success'
  ).then
}

btn_clean_inputs.onclick = () => {
  clean_inputs();
}

const clean_inputs = () => {
  in_nit_client.value = "";
  in_code_client.value = "";
  in_name_client.value = "";
  in_email_client.value = "";
  space_phone.innerHTML = "";
  space_direction.innerHTML = '';
  list_phones = [];
  list_direction = [];
  btn_add_client.classList.toggle('hide');
  btn_update_client.classList.toggle('hide');
  btn_clean_inputs.classList.toggle('hide');
}

//Validaciones
// NIT DEFAULT "CF"

//Code Client Require Number
in_code_client.onkeypress = (event) => {
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

in_phone_client.onkeyup = () => {
  disabledButton(in_phone_client, btn_delete_phone, '');
  if (in_phone_client.value === '') {
    btn_add_phone.classList.remove("disabled");
  }
}

in_direction_client.onkeyup = () => {
  disabledButton(in_direction_client, btn_delete_direction, '');
  if (in_direction_client.value === '') {
    btn_add_direction.classList.remove("disabled");
  }
}

