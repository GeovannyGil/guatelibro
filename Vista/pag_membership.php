<?php
require 'encabezado.php';
?>
<div class="row mb-4">
  <div class="col-md-12 header-title p-3">
    <h1>Membresias</h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-bg1">
          Formulario Membresias
        </div>
        <div class="card-body">
          <form action="" id="formMembership">
            <div class="row">
              <div class="form-group col-md-12">
                <label for="">tipo membresia</label>
                <select class="form-control" name="type_membership" id="type_membership">
                  <option>Mensual</option>
                  <option>Semestral</option>
                  <option>Anual</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Precio</label>
                <input type="number" name="price" id="price" placeholder="Ingrese el precio" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="">Numero de meses</label>
                <input type="number" name="date_months" id="date_months" placeholder="Ingrese el numero de meses" class="form-control">
              </div>
            </div>


          </form>
          <input type="button" class="btn btn-primary-gt btn-block" id="btnSave" value="Guardar Membresia">

        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table">
          <thead class="thead-bg1">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tipo Membresia</th>
              <th scope="col">Precio</th>
              <th scope="col">Numero de meses</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Anual</td>
              <td>899.99</td>
              <td>12</td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>Mensual</td>
              <td>149.99</td>
              <td>1</td>
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
        <form action="" id="formMembershipU">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="">tipo membresia</label>
              <select class="form-control" name="type_membershipU" id="type_membershipU">
                <option>Mensual</option>
                <option>Semestral</option>
                <option>Anual</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="">Precio</label>
              <input type="number" name="priceU" id="priceU" placeholder="Ingrese el precio" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label for="">Numero de meses</label>
              <input type="number" name="date_monthsU" id="date_monthsU" placeholder="Ingrese el numero de meses" class="form-control">
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