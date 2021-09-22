const btnUpdate = document.getElementById('btnUpdate');
const btnSave = document.getElementById('btnSave');

btnSave.onclick = () => {
  saveRegister();
}

let saveRegister = () => {
  Swal.fire({
    icon: 'success',
    title: '¡Éxito!',
    text: 'El dato fue agregado correctamente '
  }).then((response) => {
    console.log(response);
  })
}

let deleteRegister = (id) => {
  Swal.fire({
    icon: 'success',
    title: '¡Éxito!',
    text: 'El dato fue eliminado correctamente ' + id
  }).then((response) => {
    console.log(response);
  })
}

btnUpdate.onclick = () => {
  updateRegister(8);
}

let updateRegister = (id) => {
  Swal.fire({
    icon: 'success',
    title: '¡Éxito!',
    text: 'El dato fue actualizado correctamente ' + id
  }).then((response) => {
    console.log(response);
  })
  $('#modalUpdate').modal('hide');
}

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
