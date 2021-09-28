function enviar_payments(){
    var payment_type = document.getElementById('payment_type').value;
    var payment = document.getElementById('payment').value;

    if(payment_type.length>0 && payment.length>0){   
        var formData= new FormData(document.getElementById('form-payments'));
        $.ajax({
            type: "POST",
            url: "http://localhost/guatelibro/Insertar/payments",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
            
        }).done(function(response){
            var mensaje =JSON.parse(response);
            console.log(mensaje);
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: 'El dato fue agregado correctamente '
              }).then((response) => {
                window.location.href='http://localhost/guatelibro/Ver/pagos';
              })   
    
                            
        });
    }else{
    }
    
}

function mostrar_msg(id){
    Swal.fire({
        title: "¿Está seguro eliminar el dato",
        text: "Esta acción es irreversible",
        icon: "warning",
        buttons: {
            confirm : {text:'Si deseo eliminarlo',className:'sweet-warning'},
            cancel : 'Cancelar'
        },
        dangerMode: true
      })
      .then((willDelete) => {
        if (willDelete) {
            var formData= new FormData();
                    formData.append('id_payments',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/guatelibro/Eliminar/payments",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false
                    }).done(function(response){
                            var mensaje = JSON.parse(response);
                            console.log(mensaje);
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Atención',
                                    text: 'Se ha eliminado el dato',
                                    }).then(function () {							
                                    window.location.href='http://localhost/guatelibro/ver/pagos';        
                                    });                                    
                    });
        } else {
          Swal.fire("No se eliminó el dato");
        }
      });
}

function cargar(id){
    var conteo=0;
    $("#cargar"+id).parents("tr").find("td").each(function(){
            
                    if(conteo==0){
                        document.form_paymentsA.id_payments.value=$(this).html();
                    }
                    if(conteo==1){
                        document.form_paymentsA.id_member.value=$(this).html();
                    }   
                    if(conteo==2){
                        document.form_paymentsA.id_membership.value=$(this).html();
                    } 
                    if(conteo==3){
                        document.form_paymentsA.payment_type.value=$(this).html();
                    } 
                    if(conteo==4){
                        document.form_paymentsA.payment.value=$(this).html();
                    } 
                            
                  
            
            conteo++;
    });
}

function actualizar_payments(){
    var formData= new FormData(document.getElementById('form_paymentsA'));

    $.ajax({
        type: "POST",
        url: "http://localhost/guatelibro/Modificar/payments",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
        
    }).done(function(response){
        Swal.fire({
            icon: 'success',
            title: 'Atención',
            text: 'Se ha actualizado correctamente',
            }).then(function () {	
                $('#actualizarPayments').modal("hide");	
                window.location.href='http://localhost/guatelibro/ver/pagos';					
            });
    });
}