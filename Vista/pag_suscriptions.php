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
                  <option>Kevin-Paypal-100</option>
                  <option>Angel-Paypal-50</option>
                  <option>Mateo-Paypal-200</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Inicio de suscripción:</label>
                <input type="datetime-local" class="form-control" name="suscription_start" id="suscription_start">
              </div>
              <div class="form-group col-md-6">
                <label for="">Final de suscripción:</label>
                <input type="datetime-local" class="form-control" name="suscription_end" id="suscription_end">
              </div>
              <div class="form-group col-md-12">
                <label for="">Fecha de cancelación:</label>
                <input type="datetime-local" class="form-control" name="cancel_suscription" id="cancel_suscription">
              </div>
              <div class="col-md-12 mb-3">
                <li class=" list-group-item">
                  <!-- Default checked -->
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="stateSuscription" name="stateSuscription">
                    <label class="custom-control-label" for="stateSuscription">Activo </label>
                  </div>
                </li>
              </div>
            </div>
          </form>
          <input type="button" class="btn btn-primary-gt btn-block" id="btnSave" value="Guardar Suscripciones">
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table">
          <thead class="thead-bg1">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Miembro</th>
              <th scope="col">Membresia</th>
              <th scope="col">Estado</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Kevin</td>
              <td>Anual</td>
              <td> <button class="btn btn-secondary-gt"><i class="fas fa-eye"></i></button></td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>Angel</td>
              <td>Mensual</td>
              <td> <button class="btn btn-secondary-gt"><i class="fas fa-eye"></i></button></td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
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
        <form action="" id="formSuscriptionU">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="">Pagos:</label>
              <select class="form-control" name="id_paymentU" id="id_paymentU">
                <option>Kevin-Paypal-100</option>
                <option>Angel-Paypal-50</option>
                <option>Mateo-Paypal-200</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="">Inicio de suscripción:</label>
              <input type="datetime-local" class="form-control" name="suscription_startU" id="suscription_startU">
            </div>
            <div class="form-group col-md-6">
              <label for="">Final de suscripción:</label>
              <input type="datetime-local" class="form-control" name="suscription_endU" id="suscription_endU">
            </div>
            <div class="form-group col-md-12">
              <label for="">Fecha de cancelación:</label>
              <input type="datetime-local" class="form-control" name="cancel_suscriptionU" id="cancel_suscriptionU">
            </div>
            <div class="col-md-12 mb-3">
              <li class=" list-group-item">
                <!-- Default checked -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="stateSuscriptionU" name="stateSuscriptionU">
                  <label class="custom-control-label" for="stateSuscriptionU">Activo </label>
                </div>
              </li>
            </div>
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
<script src="http://localhost/guatelibro/assets/js/global.js"></script>