<?php
require 'headerClient.php';
if ($_SESSION['suscription'] == true) {
  header("Location: http://localhost/guatelibro/ver/bibliotecaDigital");
}
?>
<section>
  <div class="container py-5">

    <!-- FOR DEMO PURPOSE -->
    <header class="text-center mb-5 text-white">
      <div class="row">
        <div class="col-lg-7 mx-auto">
          <h1>¿Qué esperas?</h1>
          <p class="letra">Ten a tu alcance miles de libros de toda la comunidad<br> y también comparte tus propios
            libros.</p>
        </div>
      </div>
    </header>
    <!-- END -->

    <div class="row text-center align-items-end table-prices-membership">
      <?php
      $Cargar = new Cargar();
      $Cargar->comprar_membership();
      // echo var_dump($_SESSION['datos_suscripcion']);
      ?>

    </div>
  </div>
</section>
<?php
require 'footerClient.php';
?>
<script src="http://localhost/guatelibro/assets/js/comprar_membresia.js"></script>