function enviar_libray_user(){
    var id_member = document.getElementById('id_member').value;
    var id_product = document.getElementById('id_product').value;

    if(id_member.length>0 && id_product.length>0){   
        var formData= new FormData(document.getElementById('form-library_user'));
        $.ajax({
            type: "POST",
            url: "http://localhost/guatelibro/Insertar/library_user",
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
                window.location.href='http://localhost/guatelibro/Ver/libreria_personal';
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
                    formData.append('id_user',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/guatelibro/Eliminar/library_user",
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
                                    window.location.href='http://localhost/guatelibro/ver/libreria_personal';        
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
                        document.form_library_userA.id_user.value=$(this).html();
                    }
                    if(conteo==1){
                        document.form_library_userA.id_member.value=$(this).html();
                    }   
                    if(conteo==2){
                        document.form_library_userA.id_product.value=$(this).html();
                    } 
                            
                  
            
            conteo++;
    });
}


function actualizar_library_user(){
    var formData= new FormData(document.getElementById('form_library_userA'));

    $.ajax({
        type: "POST",
        url: "http://localhost/guatelibro/Modificar/categoria",
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
                $('#actualizarLibrary_user').modal("hide");	
                window.location.href='http://localhost/guatelibro/ver/libreria_personal';					
            });
    });
}