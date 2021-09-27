<?php
require 'encabezado.php';
?>
<div class="row mb-4 ">
  <div class="col-md-12 header-title p-3">
    <h1>CATEGORIAS</h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-bg1">
          Formulario Categorias
        </div>
        <div class="card-body">
          <form enctype="multipart/form-data" id="form-categoria">
            <div class="form-group">
              <label for="">Categoria</label>
              <input type="text" name="category" id="category" placeholder="Ingrese una categoria" class="form-control">
            </div>
          </form>
          <button type="button" onclick="enviar_categoria();" class="btn btn-primary-gt btn-block">Guardar Categoria</button>
        </div>
      </div>
    </div>
    <div class="col-md-8">
    <div class="row no-gutters">        
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar = new Cargar();
                $Cargar->categoria();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="actualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-header-bg1">
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Dato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_categoriaA" name="form_categoriaA">
          <div class="row">
            <input type="hidden" name="id_category" id="id_category" placeholder="Ingrese una categoria">
            <div class="form-group col-12">
              <label for="">Categoria</label>
              <input type="text" name="category" placeholder="Ingrese una categoria" class="form-control">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      <button type="button" onclick="actualizar_categoria();" class="btn btn-primary-gt">Actualizar Categoria</button>
        <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php
require 'footer.php';
?>
<script src="../assets/js/Category.js"></script>