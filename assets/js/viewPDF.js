const add_book_library = document.getElementById('add_book_library');

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

function add_book(id_product, id_member) {
  let formData = new FormData();
  formData.append('id_product', id_product);
  formData.append('id_member', id_member)

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/guatelibro/Insertar/library_user', true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var resultado = xhr.responseText;
      console.log(resultado);
      var json = JSON.parse(resultado);
      console.log(json);
      if (json.icon == "success") {
        Toast.fire({
          icon: json.icon,
          title: "Libro agregado a la biblioteca"
        })
        add_book_library.classList.remove('btn-primary-gt');
        add_book_library.classList.add('bg-secondary-gt');
        add_book_library.setAttribute('disabled', 'disabled');
        add_book_library.innerText = "Ya se agrego a tu biblioteca";
        add_book_library.setAttribute('disabled', 'disabled');
      } else {
        Toast.fire({
          icon: json.icon,
          title: "No se pudo agregar el libro"
        })
      }
    }
  }
  xhr.send(formData);
}

function delete_library(id_user_library) {
  let formData = new FormData();
  formData.append('id_user', id_user_library);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/guatelibro/Eliminar/library_user', true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var resultado = xhr.responseText;
      console.log(resultado);
      var json = JSON.parse(resultado);
      console.log(json);
      if (json.icon == "success") {
        Toast.fire({
          icon: json.icon,
          title: "Libro eliminado exitosamente"
        })
        setTimeout(() => {
          location.reload();
        }, 1000)
      } else {
        Toast.fire({
          icon: json.icon,
          title: "No se pudo eliminar el libro"
        })
      }
    }
  }
  xhr.send(formData);

}