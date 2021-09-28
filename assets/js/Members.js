function enviar_members(){
    var name_member = document.getElementById('name_member').value;
    var surname_member = document.getElementById('surname_member').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var direction = document.getElementById('direction').value;
    var institution = document.getElementById('institution').value;
    var user_member = document.getElementById('user_member').value;
    var password = document.getElementById('password').value;
    var id_rol  = document.getElementById('id_rol').value;
    var photo = document.getElementById('file-upload1').value;

    if(name_member.length>0 && surname_member.length>0 && photo.length>0 && email.length>0 && phone.length>0 && direction.length>0 && institution.length>0 && user_member.length>0 && password.length>0 && id_rol.length>0){
        var formData= new FormData(document.getElementById('form-members'));
        $.ajax({
            type: "POST",
            url: "http://localhost/guatelibro/Insertar/members",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
            
        }).done(function(response){
            var mensaje =JSON.parse(response);
            console.log(mensaje);
                Swal.fire({
                    icon: 'success',
                    title: 'Atención',
                    text: 'Datos Registrados',
                }).then(function () {	        
                    window.location.href='http://localhost/guatelibro/Ver/miembros';					
                });    
    
                            
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
                    formData.append('id_member',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/guatelibro/Eliminar/members",
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
                                    window.location.href='http://localhost/guatelibro/ver/miembros';        
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
                            document.form_membersA.id_member.value=$(this).html();
                    }
                    if(conteo==1){
                           document.form_membersA.name_member.value=$(this).html();
                    }  
                    if(conteo==2){
                           document.form_membersA.surname_member.value=$(this).html();
                    } 
                    if(conteo==3){
                        document.form_membersA.email.value=$(this).html();
                     } 
                     if(conteo==4){
                        document.form_membersA.phone.value=$(this).html();
                    } 
                    if(conteo==5){
                        document.form_membersA.direction.value=$(this).html();
                    } 
                     if(conteo==7){
                        document.form_membersA.institution.value=$(this).html();
                    }
                    if(conteo==10){
                        document.form_membersA.state.value=$(this).html();
                    }
                    if(conteo==8){
                        document.form_membersA.user_member.value=$(this).html();
                     }
                     if(conteo==9){
                        document.form_membersA.password.value=$(this).html();
                     }  
                     if(conteo==11){
                        document.form_membersA.id_rol.value=$(this).html();
                     }  
                                  
                    if(conteo==6){                                                    
                          $("#photoMembers").attr("src","../assets/img/members/"+$("#photo"+id).attr("alt"));
                    }
            
            conteo++;
    });
}

function actualizar_members(){
    var formData= new FormData(document.getElementById('form_membersA'));

    $.ajax({
        type: "POST",
        url: "http://localhost/guatelibro/Modificar/members",
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
                window.location.href='http://localhost/guatelibro/ver/miembros';					
            });
    });
}