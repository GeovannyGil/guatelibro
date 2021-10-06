const comprar = (id_membresia, id_miembro, price) => {
  let formData = new FormData();
  formData.append('id_membership', id_membresia);
  formData.append('id_member', id_miembro);
  formData.append('payment', price);
  formData.append('payment_type', 'Paypal');
  $.ajax({
    type: "POST",
    url: "http://localhost/guatelibro/Insertar/payments",
    data: formData,
    cache: false,
    contentType: false,
    processData: false

  }).done(function (response) {
    var mensaje = JSON.parse(response);
    console.log(mensaje);
    Swal.fire({
      icon: 'success',
      title: '¡Éxito!',
      text: 'Tu compra fue exitosa, vuelve a iniciar sesión'
    }).then(() => {
      window.location.href = 'http://localhost/guatelibro/Cerrar_session/cerrar';
    })
  });
}