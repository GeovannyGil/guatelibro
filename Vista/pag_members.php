<?php
require 'encabezado.php';
?>
<div class="row mb-4">
  <div class="col-md-12 header-title p-3">
    <h1>MIEMBROS</h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-bg1">
          Formulario Miembros
        </div>
        <div class="card-body">
          <form enctype="multipart/form-data" id="form-members">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Nombre: </label>
                <input type="text" id="name_member" name="name_member" placeholder="Ingrese el nombre del miembro" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Apellido: </label>
                <input type="text" id="surname_member" name="surname_member" placeholder="Ingrese el apellido del miembro" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Correo: </label>
                <input type="email" id="email" name="email" placeholder="Ingrese el correo electronico" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Telefono: </label>
                <input type="number" id="phone" name="phone" placeholder="Ingrese numero telefonico" class="form-control">
              </div>
              <div class="form-group col-md-12">
                <label for="">Dirección: </label>
                <input type="text" id="direction" name="direction" placeholder="Ingrese la dirección" class="form-control">
              </div>
              <div class="form-group col-md-12">
                <label for="">Institución:</label>
                <input type="text" id="institution" name="institution" placeholder="Ingrese la institución" class="form-control">
              </div>
              <div class="form-group col-md-12">
                <label for="">Estado:</label>
                <select class="form-control" name="state" id="state">
                <option value="0">Activo</option>
                <option value="1">Inactivo</option>
              </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Usuario</label>
                <input type="text" id="user_member" name="user_member" placeholder="Ingrese el usuario" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Contraseña</label>
                <input type="text" id="password" name="password" placeholder="Ingrese la contraseña" class="form-control">
              </div>

              <div class="form-group col-md-12">
                <label for="">Rol</label>
                <?php
                $Cargar = new Cargar();
                $Cargar->selectRol();
                ?>
              </div>

              <div class="form-group col-md-12 mt-4 informacion1" style="width:30%; margin-left: 30%; margin-right: auto;">        
                <input id="file-upload1" name="img-1" onchange='cambiar();' onclick="cambio()" type="file" style='display: none;' />
                    <img class="img-fluid img-prev1 img1" id="img1" src="http://localhost/guatelibro/assets/img/no_disponible.jpg" width="100" height="100" />                        
                </div>
                <div class="text-center" style="width:30%; margin-left: 30%; margin-right: auto;">                
                    <div id="info1"></div>
                    <label for="file-upload1" class="subir mt-4">
                    <i class="fas fa-images"></i> Cambiar Imagen
                    </label>                    
                </div>

            </div>
          </form>
          <button type="button" onclick="enviar_members();" class="btn btn-primary-gt btn-block">Guardar Miembro</button>
        </div>
      </div>
    </div>
    <div class="col-md-8">
    <div class="row no-gutters">        
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar->memberbers();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>
    </div>
  </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="actualizarMembers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-header-bg1">
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="form_membersA" name="form_membersA">
          <div class="row">
          <div class="form-group col-md-6">
             <input type="hidden" name="id_member">
                <label for="">Nombre: </label>
                <input type="text" id="name_member" name="name_member" placeholder="Ingrese el nombre del miembro" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Apellido: </label>
                <input type="text" id="surname_member" name="surname_member" placeholder="Ingrese el apellido del miembro" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Correo: </label>
                <input type="email" id="email" name="email" placeholder="Ingrese el correo electronico" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Telefono: </label>
                <input type="number" id="phone" name="phone" placeholder="Ingrese numero telefonico" class="form-control">
              </div>
              <div class="form-group col-md-12">
                <label for="">Dirección: </label>
                <input type="text" id="direction" name="direction" placeholder="Ingrese la dirección" class="form-control">
              </div>
              <div class="form-group col-md-12">
                <label for="">Institución:</label>
                <input type="text" id="institution" name="institution" placeholder="Ingrese la institución" class="form-control">
              </div>
              <div class="form-group col-md-12">
                <label for="">Estado:</label>
                <select class="form-control" name="state" id="state">
                <option value="0">Activo</option>
                <option value="1">Inactivo</option>
              </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Usuario</label>
                <input type="text" id="user_member" name="user_member" placeholder="Ingrese el usuario" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Contraseña</label>
                <input type="text" id="password" name="password" placeholder="Ingrese la contraseña" class="form-control">
              </div>

              <div class="form-group col-md-12">
                <label for="">Rol</label>
                <?php
                $Cargar = new Cargar();
                $Cargar->selectRol();
                ?>
              </div>

              <div class="form-group col-md-12 mt-4 informacion2" style="width:30%; margin-left: 30%; margin-right: auto;">        
                <input id="file-upload2" name="img-2" onchange='cambiar2();' onclick="cambio2()" type="file" style='display: none;' />
                    <img class="img-fluid img-prev1 img2" id="photoMembers" src="http://localhost/guatelibro/assets/img/no_disponible.jpg" width="100" height="100" />                        
                </div>
                <div class="text-center" style="width:30%; margin-left: 30%; margin-right: auto;">                
                    <div id="info1"></div>
                    <label for="file-upload2" class="subir mt-4">
                    <i class="fas fa-images"></i> Cambiar Imagen
                    </label>                    
                </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="actualizar_members();" class="btn btn-primary-gt">Actualizar Miembro</button>
        <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php
require 'footer.php';
?>
<script src="http://localhost/guatelibro/assets/js/Members.js"></script>
<script src="http://localhost/guatelibro/assets/js/cargar_img.js"></script>