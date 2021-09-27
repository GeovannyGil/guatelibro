function enviar_categoria(){
    var category = document.getElementById('category').value;

    if(category.length>0){   
        var formData= new FormData(document.getElementById('form-categoria'));
        $.ajax({
            type: "POST",
            url: "http://localhost/guatelibro/Insertar/categoria",
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
                window.location.href='http://localhost/guatelibro/Ver/categorias';
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
                    formData.append('id_category',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/guatelibro/Eliminar/categoria",
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
                                    window.location.href='http://localhost/guatelibro/ver/categorias';        
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
                        document.form_categoriaA.id_category.value=$(this).html();
                    }
                    if(conteo==1){
                        document.form_categoriaA.category.value=$(this).html();
                    }   
                            
                  
            
            conteo++;
    });
}


function actualizar_categoria(){
    var formData= new FormData(document.getElementById('form_categoriaA'));

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
                $('#actualizarCategoria').modal("hide");	
                window.location.href='http://localhost/guatelibro/ver/categorias';					
            });
    });
}