<?php
require 'headerClient.php';
if ($_SESSION['suscription'] == NULL && ($_SESSION['suscription'] == NULL && $_SESSION['rol'] !== "Alumno") && ($_SESSION['suscription'] == NULL && $_SESSION['rol'] !== "Administrador")) {
  header("Location: http://localhost/guatelibro/ver/comprar_membresias");
}
?>

<div class="container mt-5">
  <div class="row">
    <?php
    $Cargar = new Cargar();
    $Cargar->productsPDF($_GET['p']);
    ?>

  </div>
</div>

<?php
require 'footerClient.php';
?>
<script src="http://localhost/guatelibro/assets/js/viewPDF.js"></script>