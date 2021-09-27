//Javascript para el html cliente
const btn_add_client = document.getElementById("add_client");
const btn_update_client = document.getElementById("update_client");
const btn_clean_inputs = document.getElementById("clean_inputs");
//Phones
const btn_add_phone = document.getElementById("btn_add_phone");
const btn_delete_phone = document.getElementById("btn_delete_phone");
const space_phone = document.getElementById("space_phones");
//Inputs
const in_nit_client = document.getElementById("nit_client");
const in_code_client = document.getElementById("code_client");
const in_name_client = document.getElementById("name_client");
const in_email_client = document.getElementById("email_client");
const in_phone_client = document.getElementById("phone_client");
const in_direction_client = document.getElementById("direction_client");
//variables
let list_phones = [];
let id = 0;

if (btn_add_client) {
  btn_add_client.onclick = function () {
    console.log("Enviado");
    insert_client();
  };
}

/* function cargarDatos() {
  console.log("Enviado");

  $.ajax({
    url: "/consulta",
    type: "POST",
    data: JSON.stringify({ "recibido": "flask" }),
    contentType: "application/json;charset=utf-8",
    dataType: 'json',
    success: function (response) {
      var datos = response;
      var tbody = document.getElementById("tbody");
      tbody.innerHTML = "";
      datos.forEach(client => {
        let fila = document.createElement("tr");
        fila.setAttribute("id", "client_data_" + client[0]);
        fila.innerHTML = `<td>${client[0]}</td>
                          <td>${client[1]}</td>
                          <td>${client[2]}</td>
                          <td>${client[3]}</td>
                          <td>${client[4]}</td>
                           `;

        //Para los numeros
        let tdNumbers = document.createElement("td");
        JSON.parse(client[5]).forEach(number => {
          let spanNumber = document.createElement("span");
          spanNumber.classList.add("right", "badge", "badge-danger", "mx-1", "my-1");
          spanNumber.innerText = number.phone;
          tdNumbers.appendChild(spanNumber);
        });

        fila.appendChild(tdNumbers);

        //para la direccion
        let tdDireccion = document.createElement("td");
        tdDireccion.innerText = client[6];
        fila.appendChild(tdDireccion);

        let tdAcciones = document.createElement("td");
        //Boton Actualizar
        let btnActualizar = document.createElement("button");
        btnActualizar.classList.add("btn", "btn-success", "text-white");
        let iconoActualizar = document.createElement('i');
        iconoActualizar.classList.add("fas", "fa-edit", "fa-xs");
        btnActualizar.appendChild(iconoActualizar);
        btnActualizar.onclick = () => {
          update_client(client[0]);
        };
        tdAcciones.appendChild(btnActualizar);
        fila.appendChild(tdAcciones);

        tbody.appendChild(fila);
      });
    },
    error: function (error) {
      console.log(error);
    },
  });
}
cargarDatos();
 */
/*
if (btn_ajax) {
  btn_ajax.onclick = function () {
    console.log("Enviado");

    $.ajax({
      url: "/consulta",
      type: "POST",
      data: JSON.stringify({ "recibido": "flask" }),
      contentType: "application/json;charset=utf-8",
      dataType: 'json',
      success: function (response) {
        console.log(response);
      },
      error: function (error) {
        console.log(error);
      },
    });
  };
} */

function insert_client() {
  let objCliente = {
    nit_client: in_nit_client.value,
    code_client: in_code_client.value,
    name_client: in_name_client.value,
    email_client: in_email_client.value,
    phones_client: list_phones,
    direction_client: in_direction_client.value
  };

  // ajax the JSON to the server
  $.ajax({
    type: 'POST',
    url: '/add_client',
    data: JSON.stringify(objCliente),
    contentType: "application/json;charset=utf-8",
    dataType: 'json'
  });
  console.log(objCliente);
  /*   list_phones = []; */
  /* location.reload(); */
  // stop link reloading the page
  event.preventDefault();
}

function update_client(code_client) {
  let fila = document.querySelector("#client_data_" + code_client);
  id = fila.children[0].innerText;
  in_nit_client.value = fila.children[1].innerText;
  in_code_client.value = fila.children[2].innerText;
  in_name_client.value = fila.children[3].innerText;
  in_email_client.value = fila.children[4].innerText;
  var jsonPhones = JSON.parse(fila.children[5].innerText);
  in_direction_client.value = fila.children[6].innerText;
  jsonPhones.forEach(phone => {
    crearPhone(phone.phone);
  });
  btn_add_client.classList.add("ocultar");
  btn_update_client.classList.remove("ocultar");
  btn_clean_inputs.classList.remove("ocultar");

}

function eliminarDato(id) {
  $.ajax({
    type: 'POST',
    url: '/delete_client',
    data: JSON.stringify({
      "id": id
    }),
    contentType: "application/json;charset=utf-8",
    dataType: 'json'
  });

  window.location.reload();
}


if (btn_add_phone) {
  btn_add_phone.onclick = function () {
    crearPhone(in_phone_client.value);
    in_phone_client.value = "";
    /* <span class="right badge badge-danger fs-1">4396-1286</span>*/
  };
}

btn_clean_inputs.onclick = function () {
  clean_inputs();
}

function clean_inputs() {
  in_nit_client.value = "";
  in_code_client.value = "";
  in_name_client.value = "";
  in_email_client.value = "";
  in_direction_client.value = "";
  space_phone.innerHTML = "";
  list_phones = [];
}

function addPhone(number) {
  let phone_issets = false;
  //Search, if isset the phone in the object
  list_phones.forEach((phone) => {
    if (phone == in_phone_client.value) { phone_issets = true; }
  });

  if (list_phones.length < 3) {
    //Creación de span
    if (phone_issets == false) {
      let span = document.createElement("SPAN");
      span.innerHTML = number;
      let objPhones = {
        phone: number
      }
      list_phones.push(objPhones);
      span.classList.add("right", "badge_e", "badge", "badge-danger", "mx-1", "fs-1", "my-1");
      span.onclick = () => {
        number = span.innerHTML;
      };
      space_phone.appendChild(span);
    } else {
      console.log("El numero de telefono ya existe");
    }
  } else {
    console.log("Solo se puede tener 3 numeros por cliente");
  }
}

if (btn_delete_phone) {
  btn_delete_phone.onclick = function () {
    let phones = document.querySelectorAll('#space_phones .badge');
    for (var i = 0; i < phones.length; i++) {
      if (in_phone_client.value == phones[i].innerHTML) {
        phones[i].remove();
      }
    }
    list_phones = list_phones.filter(function (phone) {
      return phone.phone !== in_phone_client.value;
    });
  };
}

//Agregar nuevo elemento a AddRow
