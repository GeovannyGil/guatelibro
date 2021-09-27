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
          <form action="" id="formPayments">
            <div class="form-group">
              <label for="">Miembro</label>
              <select class="form-control" name="id_member" id="id_member">
                <option>Kevin</option>
                <option>Angel</option>
                <option>Mateo</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Membresias</label>
              <select class="form-control" name="id_membership" id="id_membership">
                <option>Mensual</option>
                <option>Semestral</option>
                <option>Anual</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Tipo Pago</label>
              <input type="text" name="payment_type" id="payment_type" placeholder="Ingrese un tipo de pago" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Pago</label>
              <input type="text" name="payment" id="payment" placeholder="Ingrese una pago" class="form-control">
            </div>
          </form>
          <input type="button" class="btn btn-primary-gt btn-block" id="btnSave" value="Guardar Pagos">
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
              <th scope="col">Tipo Pago</th>
              <th scope="col">Pago</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Kevin</td>
              <td>Anual</td>
              <td>Paypal</td>
              <td>849.99</td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Angel</td>
              <td>Mensual</td>
              <td>Paypal</td>
              <td>79.99</td>
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
        <form action="" id="formPaymentsU">
          <div class="row">
            <input type="hidden" name="keyPayments" id="keyPayments" placeholder="Ingrese una pago">
            <div class="form-group col-12">

              <label for="">Miembro</label>
              <select class="form-control" name="id_memberU" id="id_memberU">
                <option>Kevin</option>
                <option>Angel</option>
                <option>Mateo</option>
              </select>

              <label for="">Membresias</label>
              <select class="form-control" name="id_membershipU" id="id_membershipU">
                <option>Mensual</option>
                <option>Semestral</option>
                <option>Anual</option>
              </select>

              <label for="">Tipo Pago</label>
              <input type="text" name="payment_typeU" id="payment_typeU" placeholder="Ingrese un tipo de pago" class="form-control">

              <div class="form-group">
                <label for="">Pago</label>
                <input type="text" name="paymentU" id="paymentU" placeholder="Ingrese una pago" class="form-control">
              </div>
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