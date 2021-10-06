<?php
require 'headerClient.php';
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