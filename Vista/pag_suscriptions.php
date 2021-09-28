<?php
require 'encabezado.php';
?>
<div class="row mb-4">
  <div class="col-md-12 header-title p-3">
    <h1>SUSCRIPCIONES</h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-bg1">
          Formulario Suscripciones
        </div>
        <div class="card-body">
          <form action="" id="formSuscription">
            <div class="row">
              <div class="form-group col-md-12">
                <label for="">Pagos:</label>
                <select class="form-control" name="id_payment" id="id_payment">
                  <?php
                  $Cargar = new Cargar();
                  $Cargar->selectPayment();
                  ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Inicio de suscripción:</label>
                <input type="date" class="form-control" name="suscription_start" id="suscription_start">
              </div>
              <div class="form-group col-md-6">
                <label for="">Final de suscripción:</label>
                <input type="date" class="form-control" name="suscription_end" id="suscription_end">
              </div>
              <div class="form-group col-md-12">
                <label for="">Fecha de cancelación:</label>
                <input type="date" class="form-control" name="cancel_suscription" id="cancel_suscription">
              </div>
              <div class="form-group col-md-12">
                <label for="">Estado:</label>
                <select class="form-control" name="state" id="state">
                  <option value="1" default>Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
            </div>
          </form>
          <input type="button" class="btn btn-primary-gt btn-block" onclick="enviar_suscription()" value="Guardar Suscripciones">
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <?php
      $Cargar->suscription();
      ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-header-bg1">
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" id="formSuscriptionU" name="formSuscriptionU">
          <div class="row">
            <div class="form-group col-md-12">
              <input type="hidden" name="id_suscription" id="id_suscription">
              <label for="">Pagos:</label>
              <select class="form-control" name="id_paymentU" id="id_paymentU">
                <?php
                $Cargar->selectPayment();
                ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="">Inicio de suscripción:</label>
              <input type="date" class="form-control" name="suscription_startU" id="suscription_startU">
            </div>
            <div class="form-group col-md-6">
              <label for="">Final de suscripción:</label>
              <input type="date" class="form-control" name="suscription_endU" id="suscription_endU">
            </div>
            <div class="form-group col-md-12">
              <label for="">Fecha de cancelación:</label>
              <input type="date" class="form-control" name="cancel_suscriptionU" id="cancel_suscriptionU">
            </div>
            <div class="form-group col-md-12">
              <label for="">Estado:</label>
              <select class="form-control" name="stateU" id="stateU">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary-gt" onclick="actualizar_suscription()">Actualizar</button>
        <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php
require 'footer.php';
?>
<script src="http://localhost/guatelibro/assets/js/suscription.js"></script>