// Inputs
const inputRol = document.getElementById('rol');
const inputRolKey = document.getElementById('keyRol');
const inputRolU = document.getElementById('rolU');
// BTNs
const btnEnviar = document.getElementById('btnSave');
const btnUpdate = document.getElementById('btnUpdate');
// Checkbox
let checksI = document.querySelectorAll('.permitsI');
let checks = document.querySelectorAll('.permitsU');

let $permits = [];
let $permitsU = [];

for (let i = 0; i < checksI.length; i++) {
  checksI[i].addEventListener('change', function () {
    permitFunction(checksI[i].name, checksI[i].checked);
  });
}

for (let i = 0; i < checks.length; i++) {
  checks[i].addEventListener('change', function () {
    permitFunctionU(checks[i].name, checks[i].checked);
  });
}

const permitFunction = (permit, stateChecked) => {
  if (stateChecked === true) {
    $permits.push(permit);
  } else if (stateChecked === false) {
    $permits = $permits.filter((permisos) => {
      return permisos !== permit;
    });
  }
}

const permitFunctionU = (permit, stateChecked) => {
  if (stateChecked === true) {
    $permitsU.push(permit);
  } else if (stateChecked === false) {
    $permitsU = $permitsU.filter((permisos) => {
      return permisos !== permit;
    });
  }
}

const send_data = (url_send, message, input, jsons, key = 0) => {
  if (input.value !== '' && jsons !== []) {
    let formData = new FormData();
    if (key !== 0) {
      formData.append('id_rol', key);
    }
    formData.append('rol', input);
    formData.append('permits', JSON.stringify(jsons));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url_send, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var resultado = xhr.responseText;
        console.log(resultado);
        var json = JSON.parse(resultado);
        console.log(json);
        if (json.respuesta == true) {
          Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: message,
          }).then((response) => {
            if (response.isConfirmed === true) {
              window.location.href = 'http://localhost/guatelibro/ver/rol';
            }

          })
        }
      }
    }
    xhr.send(formData);
  } else {
    Swal.fire({
      icon: 'error',
      title: '¡Advertencia!',
      text: 'El campo rol y los permisos no pueden estar vacios'
    }).then((response) => {
      console.log(response);
    })
  }
}

btnEnviar.onclick = () => { send_data("http://localhost/guatelibro/Insertar/rol", "Datos Registrados", inputRol.value, $permits) }

btnUpdate.onclick = () => { send_data("http://localhost/guatelibro/Modificar/rol", "Datos Actualizados", inputRolU.value, $permitsU, inputRolKey.value) }

const deleteRegister = (id) => {
  Swal.fire({
    title: "¿Está seguro eliminar el dato",
    text: "Esta acción es irreversible",
    icon: "warning",
    showDenyButton: true,
    confirmButtonText: 'Si, deseo eliminarlo',
    denyButtonText: `Cancelar`,
    dangerMode: true
  }).then((response) => {
    if (response.isConfirmed === true) {
      var formData = new FormData();
      formData.append('id_rol', id);

      var xhr = new XMLHttpRequest();
      xhr.open('POST', "http://localhost/guatelibro/Eliminar/rol", true);
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var resultado = xhr.responseText;
          console.log(resultado);
          var json = JSON.parse(resultado);
          console.log(json);
          if (json.consulta == true) {
            Swal.fire({
              icon: 'success',
              title: '¡Éxito!',
              text: 'Datos Eliminados',
            }).then((response) => {
              if (response.isConfirmed === true) {
                window.location.href = 'http://localhost/guatelibro/ver/rol';
              }
            })
          } else {
            Swal.fire({
              icon: 'error',
              title: '¡Erorr!',
              text: 'El dato no pudo eliminarse',
            }).then((response) => {
              if (response.isConfirmed === true) {
                window.location.href = 'http://localhost/guatelibro/ver/rol';
              }
            })
          }
        }
      }
      xhr.send(formData);
    }
  });
}

const cargarDatos = (id) => {
  $permitsU = [];
  //Cargar Datos
  let formData = new FormData();
  formData.append('id_rol', id);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', "http://localhost/guatelibro/Modales/Rol", true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var resultado = xhr.responseText;
      var json = JSON.parse(resultado);
      inputRolKey.value = +json.consulta[0][0];
      inputRolU.value = json.consulta[0][1];
      let permisos = JSON.parse(json.consulta[0][2]);
      for (let i = 0; i < checks.length; i++) {
        checks[i].checked = 0;
        for (let j = 0; j < permisos.length; j++) {
          if (checks[i].name === permisos[j]) {
            checks[i].checked = 1;
            permitFunctionU(permisos[j], checks[i].checked);
          }
        }
      }
    }
  }
  xhr.send(formData);
}
