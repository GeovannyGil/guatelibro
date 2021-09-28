<?php
require 'encabezado.php';
?>

<div class="row mb-4">
  <div class="col-md-12 header-title p-3">
    <h1>PAGOS</h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-bg1">
          Formulario PAGOS
        </div>
        <div class="card-body">
          <form enctype="multipart/form-data" id="form-payments">
            <div class="form-group">
              <label for="">Miembro</label>
              <?php
                $Cargar = new Cargar();
                $Cargar->selectMembers();
                ?>
            </div>
            <div class="form-group">
              <label for="">Membresias</label>
              <?php
                $Cargar->selectMembership();
                ?>
            </div>
            <div class="form-group">
              <label for="">Tipo Pago</label>
              <input type="text" name="payment_type" id="payment_type" placeholder="Ingrese un tipo de pago" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Pago</label>
              <input type="number" name="payment" id="payment" placeholder="Ingrese una pago" class="form-control">
            </div>
          </form>
          <button type="button" onclick="enviar_payments();" class="btn btn-primary-gt btn-block">Guardar Pago</button>
        </div>
      </div>
    </div>
    <div class="col-md-8">
    <div class="row no-gutters">        
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar->payments();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>
  </div>
</div>

<div class="modal fade" id="actualizarPayments" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
      <div class="modal-header card-header-bg1">
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Dato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_paymentsA" name="form_paymentsA">
          <div class="row">
            <input type="hidden" name="id_payments" id="id_payments" placeholder="Ingrese una categoria">
            <div class="form-group col-12">
              <label for="">Miembro</label>
              <?php
                $Cargar = new Cargar();
                $Cargar->selectMembers();
                ?>
              </div>

              <div class="form-group col-12">
              <label for="">Membresias</label>
              <?php
                $Cargar->selectMembership();
                ?>
              </div>

              <div class="form-group col-12">

              <label for="">Tipo Pago</label>
              <input type="text" name="payment_type" id="payment_type" placeholder="Ingrese un tipo de pago" class="form-control">
           
              </div>

              
              <div class="form-group col-12">
              <label for="">Pago</label>
              <input type="number" name="payment" id="payment" placeholder="Ingrese una pago" class="form-control">
              </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
      <button type="button" onclick="actualizar_payments();" class="btn btn-primary-gt">Actualizar Pago</button>
        <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<?php
require 'footer.php';
?>
<script src="http://localhost/guatelibro/assets/js/Payments.js"></script>
<script src="http://localhost/guatelibro/assets/js/global.js"></script>