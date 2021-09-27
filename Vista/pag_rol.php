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
                      <input type="checkbox" class="custom-control-input permitsI" id="categoryAccess" name="categorias">
                      <label class="custom-control-label" for="categoryAccess">Categorias</label>
                    </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class="list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input permitsI" id="rolAccess" name="rol">
                        <label class="custom-control-label" for="rolAccess">Rol</label>
                      </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2"">
                          <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input permitsI" id="productAccess" name="productos">
                      <label class="custom-control-label" for="productAccess">Productos</label>
                    </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class=" list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input permitsI" id="membersAccess" name="miembros">
                        <label class="custom-control-label" for="membersAccess">Miembros</label>
                      </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class=" list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input permitsI" id="membershipAccess" name="membresias">
                        <label class="custom-control-label" for="membershipAccess">Membresias</label>
                      </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class=" list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input permitsI" id="suscriptionsAccess" name="suscripciones">
                        <label class="custom-control-label" for="suscriptionsAccess">Suscripciones</label>
                      </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class=" list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input permitsI" id="paymentsAccess" name="pagos">
                        <label class="custom-control-label" for="paymentsAccess">Pagos</label>
                      </div>
                    </li>
                  </div>
                  <div class="col-md-6 my-2">
                    <li class=" list-group-item">
                      <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input permitsI" id="clientAccesView" name="client">
                        <label class="custom-control-label" for="clientAccesView">Vista Cliente</label>
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
      <?php
      $Cargar = new Cargar();
      $Cargar->Rol();
      ?>
    </div>
  </div>
</div>
</div>
<!-- /.content-wrapper -->

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
                      <input type="checkbox" class="custom-control-input permitsU" id="categoryAccessU" name="categorias">
                      <label class="custom-control-label" for="categoryAccessU">Categorias</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class="list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input permitsU" id="rolAccessU" name="rol">
                      <label class="custom-control-label" for="rolAccessU">Rol</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input permitsU" id="productAccessU" name="productos">
                      <label class="custom-control-label" for="productAccessU">Productos</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input permitsU" id="membersAccessU" name="miembros">
                      <label class="custom-control-label" for="membersAccessU">Miembros</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input permitsU" id="membershipAccessU" name="membresias">
                      <label class="custom-control-label" for="membershipAccessU">Membresias</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input permitsU" id="suscriptionsAccessU" name="suscripciones">
                      <label class="custom-control-label" for="suscriptionsAccessU">Suscripciones</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input permitsU" id="paymentsAccessU" name="pagos">
                      <label class="custom-control-label" for="paymentsAccessU">Pagos</label>
                    </div>
                  </li>
                </div>
                <div class="col-md-6 my-2">
                  <li class=" list-group-item">
                    <!-- Default checked -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input permitsU" id="clientAccesViewU" name="client">
                      <label class="custom-control-label" for="clientAccesViewU">Vista Cliente</label>
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
<script src="http://localhost/guatelibro/assets/js/rol.js"></script>