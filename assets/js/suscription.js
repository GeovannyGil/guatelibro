function enviar_suscription() {
    var formData = new FormData(document.getElementById('formSuscription'));
    $.ajax({
        type: "POST",
        url: "http://localhost/guatelibro/Insertar/suscription",
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
            text: 'El dato fue agregado correctamente '
        }).then(() => {
            window.location.href = 'http://localhost/guatelibro/Ver/suscripciones';
        });
    });
}

function mostrar_msg(id) {
    Swal.fire({
        title: "¿Está seguro eliminar el dato",
        text: "Esta acción es irreversible",
        icon: "warning",
        buttons: {
            confirm: { text: 'Si deseo eliminarlo', className: 'sweet-warning' },
            cancel: 'Cancelar'
        },
        dangerMode: true
    })
        .then((willDelete) => {
            if (willDelete) {
                var formData = new FormData();
                formData.append('id_suscription', id)
                $.ajax({
                    type: "post",
                    url: "http://localhost/guatelibro/Eliminar/suscription",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (response) {
                    var mensaje = JSON.parse(response);
                    console.log(mensaje);
                    Swal.fire({
                        icon: 'success',
                        title: 'Atención',
                        text: 'Se ha eliminado el dato',
                    }).then(function () {
                        window.location.href = 'http://localhost/guatelibro/ver/suscripciones';
                    });
                });
            } else {
                Swal.fire("No se eliminó el dato");
            }
        });
}

function cargar(id) {
    var conteo = 0;
    $("#cargar" + id).parents("tr").find("td").each(function () {

        if (conteo == 0) {
            document.formSuscriptionU.id_suscription.value = $(this).html();
        }
        if (conteo == 1) {
            document.formSuscriptionU.id_paymentU.value = $(this).html();
        }
        if (conteo == 2) {
            document.formSuscriptionU.suscription_startU.value = $(this).html();
        }
        if (conteo == 3) {
            document.formSuscriptionU.suscription_endU.value = $(this).html();
        }
        if (conteo == 4) {
            document.formSuscriptionU.cancel_suscriptionU.value = $(this).html();
        }
        if (conteo == 5) {
            document.formSuscriptionU.stateU.value = $(this).html();
        }
        conteo++;
    });
}

function actualizar_suscription() {
    var formData = new FormData(document.getElementById('formSuscriptionU'));

    $.ajax({
        type: "POST",
        url: "http://localhost/guatelibro/Modificar/suscription",
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    }).done(function (response) {
        Swal.fire({
            icon: 'success',
            title: 'Atención',
            text: 'Se ha actualizado correctamente',
        }).then(function () {
            $('#actualizarPayments').modal("hide");
            window.location.href = 'http://localhost/guatelibro/ver/suscripciones';
        });
    });
}