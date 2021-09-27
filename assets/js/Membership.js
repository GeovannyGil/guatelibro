function enviar_membership(){
    var type_membership = document.getElementById('type_membership').value;
    var price = document.getElementById('price').value;
    var date_months = document.getElementById('date_months').value;

    if(type_membership.length>0 && price.length>0 && date_months.length>0){   
        var formData= new FormData(document.getElementById('form-membership'));
        $.ajax({
            type: "POST",
            url: "http://localhost/guatelibro/Insertar/membership",
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
                window.location.href='http://localhost/guatelibro/Ver/membresias';
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
                    formData.append('id_membership',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/guatelibro/Eliminar/membership",
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
                                    window.location.href='http://localhost/guatelibro/ver/membresias';        
                                    });                                    
                    });
        } else {
          swal("No se eliminó el dato");
        }
      });
}

function cargar(id){
    var conteo=0;
    $("#cargar"+id).parents("tr").find("td").each(function(){
            
                    if(conteo==0){
                        document.form_membershipA.id_membership.value=$(this).html();
                    }
                    if(conteo==1){
                        document.form_membershipA.type_membership.value=$(this).html();
                    }  
                    if(conteo==2){
                        document.form_membershipA.price.value=$(this).html();
                    }   
                    if(conteo==3){
                        document.form_membershipA.date_months.value=$(this).html();
                    }    
                            
                  
            
            conteo++;
    });
}

function actualizar_membership(){
    var formData= new FormData(document.getElementById('form_membershipA'));

    $.ajax({
        type: "POST",
        url: "http://localhost/guatelibro/Modificar/membership",
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
                $('#actualizarMembership').modal("hide");	
                window.location.href='http://localhost/guatelibro/ver/membresias';					
            });
    });
}