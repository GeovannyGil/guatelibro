<?php
require 'headerClient.php';
?>
<?php
if (!$_GET['page']) {
  header('Location:http://localhost/guatelibro/ver/bibliotecadigital?page=1&cat=0');
}

?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 tab-container-buttons">

      <?php
      $Cargar = new Cargar();
      $Cargar->botonesCategorias();
      ?>
    </div>
    <div class="col-md-12">
      <div class="title-tab-container px-2">

        <?php
        $Cargar->labelsCategorias();
        ?>
      </div>
    </div>
  </div>
  <?php
  $Cargar->productPagination($_GET['page'], $_GET['cat']);
  ?>

  <!-- <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav> -->
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
        <button type="button" class="btn btn-primary-gt">Agregar a mi biblioteca</button>
        <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
require 'footerClient.php';
?>
<script src="http://localhost/guatelibro/assets/js/biblioteca.js"></script>