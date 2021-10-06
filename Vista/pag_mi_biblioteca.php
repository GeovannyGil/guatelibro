<?php
require 'headerClient.php';
if (!$_GET['catP'] || !$_GET['catS']) {
  header('Location:http://localhost/guatelibro/ver/mibiblioteca?catP=todos&catS=todos');
}
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 mb-5 btn-add-product">
      <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
          <filter id="gooey">
            <!-- in="sourceGraphic" -->
            <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />
            <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="highContrastGraphic" />
            <feComposite in="SourceGraphic" in2="highContrastGraphic" operator="atop" />
          </filter>
        </defs>
      </svg>

      <button id="gooey-button" data-toggle="modal" data-target=".modal-product-add">
        <i class="fas fa-plus"></i>
        Agregar Libro
        <span class="bubbles">
          <span class="bubble"></span>
          <span class="bubble"></span>
          <span class="bubble"></span>
          <span class="bubble"></span>
          <span class="bubble"></span>
          <span class="bubble"></span>
          <span class="bubble"></span>
          <span class="bubble"></span>
          <span class="bubble"></span>
          <span class="bubble"></span>
        </span>
      </button>
    </div>
    <div class="modal fade modal-product-add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header card-header-bg1">
            <h5 class="modal-title " id="exampleModalLongTitle">Agregar un nuevo libro</h5>
          </div>
          <div class="modal-body">
            <form action="" id="formProducts">
              <div class="row">
                <input type="hidden" name="selectMember" id="selectMember" value="<?php echo $_SESSION['id_member'] ?>">
                <div class="form-group col-md-12 my-2">
                  <label for="">Nombre Producto</label>
                  <input type="text" placeholder="Ingrese el nombre del producto" name="productName" id="productName" class="form-control">
                </div>
                <div class="form-group col-md-12 my-2">
                  <label for="">Descripción</label>
                  <textarea name="description" id="description" class="form-control" rows="3" cols="20" placeholder="Ingrese el nombre del producto"></textarea>
                </div>
                <label for="">Portada: </label>
                <div class="col-md-12 my-2 mt-4 informacion1 content-input-img">

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

                <div class="form-group col-md-12 my-2">
                  <label for="">Documento: </label>
                  <input type="file" name="file" id="file" class="input-file">
                  <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Cargar documento pdf</span>
                  </label>
                </div>

                <div class="form-group col-md-6 my-2">
                  <label for="">Fecha Registro</label>
                  <input type="date" name="dateRegister" id="dateRegister" class="form-control">
                </div>

                <div class="form-group col-md-6 my-2">
                  <label for="">Categoria</label>
                  <?php
                  $Cargar = new Cargar();
                  $Cargar->selectCategoria();
                  ?>
                </div>

              </div>
            </form>
          </div>
          <div class="modal-footer mt-4">
            <input type="button" id="btnSave" class="btn btn-primary-gt btn-block" value="Guardar Libreria Personal">
            <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <h1>Agregados a mi biblioteca</h1>
    <div class="col-md-12 tab-container-buttons">
      <?php
      $Cargar->botonesCategoriaPersonal();
      ?>
    </div>
    <div class="title-tab-container px-2">
      <?php
      $Cargar->labelsCategoriaPersonal();
      ?>
    </div>
  </div>
  <?php
  $Cargar->productMember($_SESSION['id_member'], $_GET['catP']);
  ?>
  <h1 class="mt-3">Mis Documentos</h1>
  <div class="row">
    <div class="col-md-12 tab-container-buttons mt-2">
      <?php
      $Cargar->botonesCategoriaLibrosPersonales();
      ?>
    </div>
    <div class="title-tab-container  px-2">
      <?php
      $Cargar->labelsCategoriaLibrosPersonal();
      ?>
    </div>
  </div>
  <?php
  $Cargar->productMemberSubidos($_SESSION['id_member'], $_GET['catS']);
  ?>
</div>

<div class="modal fade modal-product-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detalles del libro</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="portada-book-modal">
              <img src="" id="img_product" alt="Responsive image">
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <h4>Titulo:</h4>
                <p id="title_product"></p>
              </div>
              <div class="col-md-12 text-description-modal ">
                <h4>Descripción:</h4>
                <p id="description_product"></p>
              </div>
              <div class="col-md-12 text-autor-modal">
                <h5>Subido por:</h5>
                <p id="id_member_up"></p>
              </div>
              <div class="col-md-12 text-autor-modal">
                <h5>Fecha de subida</h5>
                <p id="date_up_book"></p>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <a href="" id="view_pdf" class="btn btn-primary-gt"><i class="fas fa-eye"></i> Ver
          libro</a>
        <button type="button" class="btn btn-danger" id="delete_book_library">Eliminar de mi biblioteca</button>
        <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-header-bg1">
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Dato</h5>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="formProductsU" name="formProductsU">
          <input type="hidden" id="keyProduct" name="keyProduct">
          <input type="hidden" id="selectMemberU" name="selectMemberU" value="<?php echo $_SESSION['id_member'] ?>">
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
        </form>
      </div>
      <div class="modal-footer">
        <a href="" id="view_pdf2" class="btn btn-primary-gt"><i class="fas fa-eye"></i> Ver
          libro</a>
        <button type="button" class="btn btn-danger" id="btnDelete">Eliminar libro</button>
        <button type="button" class="btn btn-primary-gt" id="btnUpdate">Actualizar</button>
        <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- </div> -->
<?php
require 'footerClient.php';
?>
<script src="http://localhost/guatelibro/assets/js/cargar_img.js"></script>
<script src="http://localhost/guatelibro/assets/js/mi_biblioteca.js"></script>