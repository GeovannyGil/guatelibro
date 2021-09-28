const btnEnviar = document.getElementById('btnSave');

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
            // window.location.href = 'http://localhost/guatelibro/ver/rol';
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
  // } else {
  //   Swal.fire({
  //     icon: 'error',
  //     title: '¡Advertencia!',
  //     text: 'El campo rol y los permisos no pueden estar vacios'
  //   }).then((response) => {
  //     console.log(response);
  //   })
  // }
}

btnEnviar.onclick = () => { send_data() }


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

})();