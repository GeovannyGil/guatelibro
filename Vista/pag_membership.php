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
          <form enctype="multipart/form-data" id="form-membership">
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
          <button type="button" onclick="enviar_membership();" class="btn btn-primary-gt btn-block">Guardar Membresia</button>
        </div>
      </div>
    </div>
    <div class="col-md-8">
    <div class="row no-gutters">        
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar = new Cargar();
                $Cargar->membership();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>
    </div>
  </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="actualizarMembership" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-header-bg1">
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_membershipA" name="form_membershipA">
          <div class="row">
            <div class="form-group col-md-12">
            <input type="hidden" name="id_membership" id="id_membership" placeholder="Ingrese una categoria">
      
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
      </div>
      <div class="modal-footer">
      <button type="button" onclick="actualizar_membership();" class="btn btn-primary-gt">Actualizar Categoria</button>
        <button type="button" class="btn btn-secondary-gt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php
require 'footer.php';
?>
<script src="../assets/js/Membership.js"></script>