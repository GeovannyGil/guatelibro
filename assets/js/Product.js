const btnEnviar = document.getElementById('btnSave');
const btnUpdate = document.getElementById('btnUpdate');

const formProduct = document.getElementById('formProducts');
const productName = document.getElementById('productName').value;
const selectMember = document.getElementById('selectMember').value;
const description = document.getElementById('description').value;
const file_img = document.getElementById('file-upload1').value;
const file_document = document.getElementById('file').value;
const dateRegister = document.getElementById('dateRegister').value;
const select_category = document.getElementById('select_category').value;


const send_data = () => {
  // if (input.value !== '' && jsons !== []) {
  let formData = new FormData(formProduct);

  console.log(formData);
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/guatelibro/Insertar/product', true);
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
          title: '¡Éxito!',
          text: json.message,
        }).then((response) => {
          if (response.isConfirmed === true) {
            window.location.href = 'http://localhost/guatelibro/ver/productos';
          }
        })
      } else {
        Swal.fire({
          icon: json.type_message,
          title: '¡Éxito!',
          text: json.message,
        })
      }
    }
  }
  xhr.send(formData);
}

btnEnviar.onclick = () => { send_data() }

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
      formData.append('id_product', id);

      var xhr = new XMLHttpRequest();
      xhr.open('POST', "http://localhost/guatelibro/Eliminar/product", true);
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
                window.location.href = 'http://localhost/guatelibro/ver/productos';
              }
            })
          } else {
            Swal.fire({
              icon: 'error',
              title: '¡Erorr!',
              text: 'El dato no pudo eliminarse',
            })
          }
        }
      }
      xhr.send(formData);
    }
  });
}


function cargar(id) {
  var conteo = 0;
  $("#cargar" + id).parents("tr").find("td").each(function () {

    if (conteo == 0) {
      document.formProductsU.keyProduct.value = $(this).html();
    }
    if (conteo == 1) {
      document.formProductsU.productNameU.value = $(this).html();
    }
    if (conteo == 2) {
      document.formProductsU.descriptionU.value = $(this).html();
    }
    if (conteo == 4) {
      $("#portadaProduct").attr("src", "../assets/img/portadas/" + $("#image_product" + id).attr("alt"));
    }
    if (conteo == 5) {
      document.formProductsU.dateRegisterU.value = $(this).html();
    }
    if (conteo == 6) {
      document.formProductsU.selectCategoryU.value = $(this).html();
    }
    if (conteo == 7) {
      document.formProductsU.selectMemberU.value = $(this).html();
    }
    conteo++;
  });
}

btnUpdate.onclick = () => { actualizar_product() }

const actualizar_product = () => {
  var formData = new FormData(document.getElementById('formProductsU'));

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/guatelibro/Modificar/product', true);
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
          title: '¡Éxito!',
          text: json.message,
        }).then((response) => {
          if (response.isConfirmed === true) {
            window.location.href = 'http://localhost/guatelibro/ver/productos';
          }
        })
      } else {
        Swal.fire({
          icon: json.type_message,
          title: '¡Éxito!',
          text: json.message,
        })
      }
    }
  }
  xhr.send(formData);
}

(function () {

  'use strict';

  $('.input-file').each(function () {
    var $input = $(this),
      $label = $input.next('.js-labelFile'),
      labelVal = $label.html();

    $input.on('change', function (element) {
      var fileName = '';
      if (element.target.value) fileName = element.target.value.split('\\').pop();
      fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
    });
  });

  $('.input-file2').each(function () {
    var $input = $(this),
      $label = $input.next('.js-labelFile2'),
      labelVal = $label.html();

    $input.on('change', function (element) {
      var fileName = '';
      if (element.target.value) fileName = element.target.value.split('\\').pop();
      fileName ? $label.addClass('has-file').find('.js-fileName2').html(fileName) : $label.removeClass('has-file').html(labelVal);
    });
  });

})();