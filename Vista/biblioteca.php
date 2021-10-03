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
              <img src="./img/portadas/memory.jpeg" alt="Responsive image">
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <h4>Titulo:</h4>
                <p>Aquella Noche</p>
              </div>
              <div class="col-md-12">
                <h4>Descripción:</h4>
                <p class="text-description-modal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam dolorum
                  dolor dolores recusandae,
                  delectus voluptate distinctio velit tempore aliquam ab quos placeat dicta sapiente adipisci
                  asperiores voluptatum alias. Consequuntur, minus.
                  Ex voluptatum laboriosam ullam, modi dignissimos non. Sed nihil voluptatibus delectus ipsa beatae
                  earum totam quae dolore ducimus exercitationem? Doloribus sunt corrupti repellat similique quis
                  mollitia amet voluptatem, sit nulla.
                  Optio consequatur minus earum inventore officia, suscipit maxime nisi totam possimus aperiam
                  accusamus, voluptatum dignissimos rem quidem placeat. Ex itaque pariatur dolores laboriosam. Eum
                  placeat, hic delectus sit eveniet qui.
                  Fugiat veniam, suscipit dicta quos, beatae ab non et incidunt inventore eveniet sint voluptatibus at
                  esse ex voluptatum ipsam iste. Possimus aperiam repudiandae placeat quidem, provident voluptate
                  officia quibusdam nisi!
                  At quo assumenda ex fuga error eligendi, cum debitis enim sint sunt facere, ipsa suscipit quidem
                  delectus, nisi reprehenderit doloremque sed magni mollitia soluta architecto sequi porro. Nulla, in
                  reiciendis?
                  Culpa tenetur minus quisquam vel dolor necessitatibus perferendis aperiam ullam! Repellat, dicta.
                  Facere facilis asperiores ipsam expedita autem! Quod voluptatem accusamus error repellendus esse eum
                  veritatis ducimus beatae voluptate. Inventore.</p>
              </div>
              <div class="col-md-12 text-autor-modal">
                <h5>Subido por:</h5>
                <p>Angel Teret</p>
              </div>
              <div class="col-md-12 text-autor-modal">
                <h5>Fecha de subida</h5>
                <p>25/06/2018</p>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <a href="http://localhost/guatelibro/viewPdf.html" class="btn btn-primary-gt"><i class="fas fa-eye"></i> Ver
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
<script src="http://localhost/guatelibro/assets/js/script.js"></script>