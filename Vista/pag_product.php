<?php
require 'encabezado.php';
?>
<div class="row mb-4">
  <div class="col-md-12 header-title p-3">
    <h1>PRODUCTOS</h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-bg1">
          Formulario Productos
        </div>
        <div class="card-body">
          <form action="" id="formProducts">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Nombre Producto</label>
                <input type="text" placeholder="Ingrese el nombre del producto" name="productName" id="productName" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Miembro</label>
                <?php
                $Cargar = new Cargar();
                $Cargar->selectMember();
                ?>
              </div>
              <div class="form-group col-md-12">
                <label for="">Descripción</label>
                <textarea name="description" id="description" class="form-control" rows="3" cols="20" placeholder="Ingrese el nombre del producto"></textarea>
              </div>
              <label for="">Portada: </label>
              <div class="col-md-12 mt-4 informacion1 content-input-img">

                <div class="div-img-file-input">
                  <input id="file-upload1" name="img-1" onchange='cambiar();' onclick="cambio()" type="file" style='display: none;' />
                  <img class="img-fluid img-prev1 img1" id="img1" src="http://localhost/guatelibro/assets/img/no_disponible.png">
                </div>
                <div class="div-button-info-img">
                  <div id="info1"></div>
                  <label for="file-upload1" class="subir mt-2 btn btn-secondary-gt">
                    <i class="fas fa-images"></i> Selecciona una imagen
                  </label>
                </div>

              </div>

              <div class="form-group col-md-12">
                <label for="">Documento: </label>
                <input type="file" name="file" id="file" class="input-file">
                <label for="file" class="btn btn-tertiary js-labelFile">
                  <i class="icon fa fa-check"></i>
                  <span class="js-fileName">Cargar documento pdf</span>
                </label>
              </div>

              <div class="form-group col-md-6">
                <label for="">Fecha Registro</label>
                <input type="date" name="dateRegister" id="dateRegister" class="form-control">
              </div>

              <div class="form-group col-md-6">
                <label for="">Categoria</label>
                <?php
                $Cargar->selectCategoria();
                ?>
              </div>

            </div>
          </form>
          <input type="button" id="btnSave" class="btn btn-primary-gt btn-block" value="Guardar Libreria Personal">
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <?php
      $Cargar->products();
      ?>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-header-bg1">
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Dato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="formProductsU" name="formProductsU">
          <input type="hidden" id="keyProduct" name="keyProduct">
          <div class="form-group">
            <label for="">Nombre Producto</label>
            <input type="text" placeholder="Ingrese el nombre del producto" name="productNameU" id="productNameU" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Descripción</label>
            <textarea name="descriptionU" id="descriptionU" class="form-control" rows="3" cols="20" placeholder="Ingrese el nombre del producto"></textarea>
          </div>

          <label for="">Portada: </label>
          <div class="col-md-12 mt-4 informacion2 content-input-img">
            <div class="div-img-file-input">
              <input id="file-upload2" name="img-2" onchange='cambiar2();' onclick="cambio2()" type="file" style='display: none;' />
              <img class="img-fluid img-prev2 img2" id="portadaProduct" src="http://localhost/guatelibro/assets/img/no_disponible.png">
            </div>
            <div class="div-button-info-img">
              <div id="info2"></div>
              <label for="file-upload2" class="subir mt-2 btn btn-secondary-gt">
                <i class="fas fa-images"></i> Selecciona una imagen
              </label>
            </div>
          </div>

          <div class="form-group col-md-12">
            <label for="">Documento: </label>
            <input type="file" name="file2" id="file2" class="input-file2">
            <label for="file2" class="btn btn-tertiary js-labelFile2">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName2" id="js-fileName2">Cargar documento pdf</span>
            </label>
          </div>

          <div class="form-group">
            <label for="">Fecha Registro</label>
            <input type="date" name="dateRegisterU" id="dateRegisterU" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Categoria</label>
            <select class="form-control" name="selectCategoryU" id="selectCategoryU">
              <?php
              $Cargar->selectCategoria2();
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Miembro</label>
            <select class="form-control" name="selectMemberU" id="selectMemberU">
              <?php
              $Cargar->selectMember2();
              ?>
            </select>
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
<script src="http://localhost/guatelibro/assets/js/cargar_img.js"></script>
<script src="http://localhost/guatelibro/assets/js/product.js"></script>