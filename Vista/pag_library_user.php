<?php
require 'encabezado.php';
?>
<div class="row mb-4">
  <div class="col-md-12 header-title p-3">
    <h1>LIBRERIA PERSONAL</h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-bg1">
          Formulario Libreria Personal
        </div>
        <div class="card-body">
          <form action="" id="formLibraryUser">
            <div class="form-group">
              <label for="">Miembro</label>
              <select class="form-control" name="selectMember" id="selectMember">
                <option>Kevin</option>
                <option>Angel</option>
                <option>Mateo</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Producto</label>
              <select class="form-control" name="selectProduct" id="selectProduct">
                <option>Libro 1</option>
                <option>Libro 2</option>
                <option>Libro 3</option>
              </select>
            </div>
          </form>
          <input type="button" id="btnSave" class="btn btn-primary-gt btn-block" value="Guardar Libreria Personal">

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
              <th scope="col">Producto</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Kevin</td>
              <td>Libro 1</td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Angel</td>
              <td>Libro 2</td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Mateo</td>
              <td>Libro 3</td>
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
</div>

<!-- Modal -->
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
        <form action="" id="formLibraryUserU">
          <input type="hidden" id="keyLibraryUser" id="keyLibraryUser">
          <div class="form-group">
            <label for="">Miembro</label>
            <select class="form-control" name="selectMemberU" id="selectMemberU">
              <option>Kevin</option>
              <option>Angel</option>
              <option>Mateo</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Producto</label>
            <select class="form-control" name="selectProductU" id="selectProductU">
              <option>Libro 1</option>
              <option>Libro 2</option>
              <option>Libro 3</option>
            </select>
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