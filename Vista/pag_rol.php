<?php
require 'encabezado.php';
?>
<div class="row mb-4">
  <div class="col-md-12 header-title p-3">
    <h1>ROL</h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-bg1">
          Formulario Rol
        </div>
        <div class="card-body">
          <form action="" id="formRol">
            <div class="form-group">
              <label for="">Rol</label>
              <input type="text" name="rol" id="rol" placeholder="Ingrese una rol" class="form-control">
            </div>
            <div class="form-group">
              <ul class="list-group list-group-flush">
                <div class="row" id="listAccess">
                  <div class="col-md-6 my-2"">
                          <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="categoryAccess" name="categoryAccess">
                      <label class="custom-control-label" for="categoryAccess">Categorias</label>
                    </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class="list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rolAccess" name="rolAccess">
                        <label class="custom-control-label" for="rolAccess">Rol</label>
                      </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2"">
                          <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="productAccess" name="productAccess">
                      <label class="custom-control-label" for="productAccess">Productos</label>
                    </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class=" list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="membersAccess" name="membersAccess">
                        <label class="custom-control-label" for="membersAccess">Miembros</label>
                      </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class=" list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="membershipAccess"
                          name="membershipAccess">
                        <label class="custom-control-label" for="membershipAccess">Membresias</label>
                      </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class=" list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="suscriptionsAccess"
                          name="suscriptionsAccess">
                        <label class="custom-control-label" for="suscriptionsAccess">Suscripciones</label>
                      </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class=" list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="paymentsAccess" name="paymentsAccess">
                        <label class="custom-control-label" for="paymentsAccess">Pagos</label>
                      </div>
                    </li>
                  </div>
                </div>
              </ul>
            </div>
          </form>
          <input type="button" class="btn btn-primary-gt btn-block" value="Guardar Rol" id="btnSave">

        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table">
          <thead class="thead-bg1">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Rol</th>
              <th scope="col">Permisos</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Administrador</td>
              <td>Registrar</td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i
                    class="fas fa-edit"></i></button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Alumno</td>
              <td>Ver</td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i
                    class="fas fa-edit"></i></button>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Profesor</td>
              <td>Editar</td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i
                    class="fas fa-edit"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-header-bg1">
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="formRolU">
          <input type="hidden" id="keyRol" name="keyRol">
          <div class="form-group">
            <label for="">Rol</label>
            <input type="text" name="rolU" id="rolU" placeholder="Ingrese una rol" class="form-control">
          </div>
          <div class="form-group">
            <ul class="list-group list-group-flush">
              <div class="row" id="listAccessU">
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="categoryAccessU" name="categoryAccessU">
                      <label class="custom-control-label" for="categoryAccessU">Categorias</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class="list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="rolAccessU" name="rolAccessU">
                      <label class="custom-control-label" for="rolAccessU">Rol</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="productAccessU" name="productAccessU">
                      <label class="custom-control-label" for="productAccessU">Productos</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="membersAccessU" name="membersAccessU">
                      <label class="custom-control-label" for="membersAccessU">Miembros</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="membershipAccessU"
                        name="membershipAccessU">
                      <label class="custom-control-label" for="membershipAccessU">Membresias</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="suscriptionsAccessU"
                        name="suscriptionsAccessU">
                      <label class="custom-control-label" for="suscriptionsAccessU">Suscripciones</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="paymentsAccessU" name="paymentsAccessU">
                      <label class="custom-control-label" for="paymentsAccessU">Pagos</label>
                    </div>
                  </li>
                </div>
              </div>
            </ul>
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