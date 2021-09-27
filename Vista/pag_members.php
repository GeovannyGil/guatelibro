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
          <form action="" id="formMembers">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Nombre: </label>
                <input type="text" id="name" name="name" placeholder="Ingrese el nombre del miembro" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Apellido: </label>
                <input type="text" id="lastName" name="lastName" placeholder="Ingrese el apellido del miembro" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Correo: </label>
                <input type="email" id="email" name="email" placeholder="Ingrese el correo electronico" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Telefono: </label>
                <input type="number" id="phone" name="phone" placeholder="Ingrese numero telefonico" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Dirección: </label>
                <input type="text" id="direction" name="direction" placeholder="Ingrese la dirección" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Rol</label>
                <select class="form-control" id="idRol" name="idRol">
                  <option>Admin</option>
                  <option>Estudiante</option>
                  <option>Profesor</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Usuario</label>
                <input type="text" id="userMember" name="userMember" placeholder="Ingrese el usuario" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Contraseña</label>
                <input type="text" id="passwordMember" name="passwordMember" placeholder="Ingrese la contraseña" class="form-control">
              </div>

              <div class="form-group col-md-12">
                <label for="">Institución:</label>
                <input type="text" id="institution" name="institution" placeholder="Ingrese la institución" class="form-control">
              </div>

            </div>
          </form>
          <input type="button" class="btn btn-primary-gt btn-block" id="btnSave" value="Guardar Miembro">

        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table">
          <thead class="thead-bg1">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Correo</th>
              <th scope="col">Telefono</th>
              <th scope="col">Dirección</th>
              <th scope="col">Institución</th>
              <th scope="col">Usuario</th>
              <th scope="col">Contraseña</th>
              <th scope="col">Estado</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Kevin</td>
              <td>Gil</td>
              <td>kevin@gmail.com</td>
              <td>1451215</td>
              <td>Sumpango</td>
              <td>Liceo Icc</td>
              <td>KevinGil</td>
              <td>Kevin123</td>
              <td><button class="btn btn-secondary-gt"><i class="fas fa-eye"></i></button></td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>Kevin</td>
              <td>Gil</td>
              <td>kevin@gmail.com</td>
              <td>1451215</td>
              <td>Sumpango</td>
              <td>Liceo Icc</td>
              <td>KevinGil</td>
              <td>Kevin123</td>
              <td><button class="btn btn-secondary-gt"><i class="fas fa-eye"></i></button></td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-header-bg1">
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="formMembersU">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="">Nombre: </label>
              <input type="text" id="nameU" name="nameU" placeholder="Ingrese el nombre del miembro" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label for="">Apellido: </label>
              <input type="text" id="lastNameU" name="lastNameU" placeholder="Ingrese el apellido del miembro" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label for="">Correo: </label>
              <input type="email" id="emailU" name="emailU" placeholder="Ingrese el correo electronico" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label for="">Telefono: </label>
              <input type="number" id="phoneU" name="phoneU" placeholder="Ingrese numero telefonico" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label for="">Dirección: </label>
              <input type="text" id="directionU" name="directionU" placeholder="Ingrese la dirección" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label for="">Rol</label>
              <select class="form-control" id="idRolU" name="idRolU">
                <option>Admin</option>
                <option>Estudiante</option>
                <option>Profesor</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="">Usuario</label>
              <input type="text" id="userMemberU" name="userMemberU" placeholder="Ingrese el usuario" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label for="">Contraseña</label>
              <input type="text" id="passwordMemberU" name="passwordMemberU" placeholder="Ingrese la contraseña" class="form-control">
            </div>

            <div class="form-group col-md-12">
              <label for="">Institución:</label>
              <input type="text" id="institutionU" name="institutionU" placeholder="Ingrese la institución" class="form-control">
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary-gt" id="btnUpdate">Actualizar</button>
        <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php
require 'footer.php';
?>
<script src="http://localhost/guatelibro/assets/js/global.js"></script>