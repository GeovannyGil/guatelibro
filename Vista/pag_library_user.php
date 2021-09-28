<?php
require 'encabezado.php';
?>
<div class="row mb-4">
  <div class="col-md-12 header-title p-3">
    <h1>LIBRERIA PERSONAL</h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-bg1">
          Formulario Libreria Personal
        </div>
        <div class="card-body">
          <form enctype="multipart/form-data" id="form-library_user">
            <div class="form-group">
              <label for="">Miembro</label>
              <?php
              $Cargar = new Cargar();
              $Cargar->selectMembers();
              ?>
            </div>
            <div class="form-group">
              <label for="">Producto</label>
              <?php
              $Cargar->selectProduct();
              ?>
            </div>
          </form>
          <button type="button" onclick="enviar_library_user();" class="btn btn-primary-gt btn-block">Guardar Libreria Personal</button>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="row no-gutters">
        <!-- parte del encabezado-->

        <!-- Cuerpo de la página-->
        <?php
        $Cargar->library_user();
        ?>
        <!-- Cuerpo de la página-->
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="actualizarLibrary_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-header-bg1">
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Dato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_library_userA" name="form_library_userA">
          <input type="hidden" name="id_user" id="id_user">
          <div class="form-group">
            <label for="">Miembro</label>
            <select class="form-control" name="selectMemberU" id="selectMemberU">
              <?php
              $Cargar->selectMember2();
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Producto</label>
            <select class="form-control" name="selectProductU" id="selectProductU">
              <?php
              $Cargar->selectProduct2();
              ?>
            </select>
          </div>
      </div>
      </form>

      <div class="modal-footer">
        <button type="button" onclick="actualizar_library_user();" class="btn btn-primary-gt">Actualizar Libreria Personal</button>
        <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>


<?php
require 'footer.php';
?>
<script src="http://localhost/guatelibro/assets/js/Library_user.js"></script>
<script src="http://localhost/guatelibro/assets/js/global.js"></script>