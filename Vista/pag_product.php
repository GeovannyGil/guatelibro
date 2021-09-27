<?php
require 'encabezado.php';
?>
<div class="row mb-4">
  <div class="col-md-12 header-title p-3">
    <h1>PRODUCTOS</h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-bg1">
          Formulario Productos
        </div>
        <div class="card-body">
          <form action="" id="formProducts">
            <div class="form-group">
              <label for="">Nombre Producto</label>
              <input type="text" placeholder="Ingrese el nombre del producto" name="productName" id="productName" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Descripción</label>
              <textarea name="description" id="description" class="form-control" rows="3" cols="20" placeholder="Ingrese el nombre del producto"></textarea>
            </div>
            <div class="form-group">
              <label for="">Path del Producto</label>
              <input type="text" name="pathProduct" id="pathProduct" placeholder="Ingrese el path del producto" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Fecha Registro</label>
              <input type="date" name="dateRegister" id="dateRegister" class="form-control">
            </div>

            <div class="form-group">
              <label for="">Categoria</label>
              <select class="form-control" name="selectCategory" id="selectCategory">
                <option>Revista</option>
                <option>Libro</option>
                <option>Articulo 3</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Miembro</label>
              <select class="form-control" name="selectMember" id="selectMember">
                <option>Kevin</option>
                <option>Angel</option>
                <option>Mateo</option>
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
              <th scope="col">Nombre</th>
              <th scope="col">Descripción</th>
              <th scope="col">Path</th>
              <th scope="col">Fecha Registro</th>
              <th scope="col">Categoria</th>
              <th scope="col">Miembro</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Harry Potter</td>
              <td>Libro Entretenido</td>
              <td>141541</td>
              <td>14-05-2021</td>
              <td>Libro</td>
              <td>Kevin</td>
              <td>
                <button class="btn btn-secondary-gt" onclick="deleteRegister(5)"><i class="fas fa-trash"></i></button>
                <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Harry Potter 2</td>
              <td>Libro Divertido</td>
              <td>158441</td>
              <td>15-05-2021</td>
              <td>Libro</td>
              <td>Angel</td>
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
        <h5 class="modal-title " id="exampleModalLongTitle">Actualizar Dato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="formProductsU">
          <input type="hidden" id="keyProduct" name="keyProduct">
          <div class="form-group">
            <label for="">Nombre Producto</label>
            <input type="text" placeholder="Ingrese el nombre del producto" name="productNameU" id="productNameU" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Descripción</label>
            <textarea name="descriptionU" id="descriptionU" class="form-control" rows="3" cols="20" placeholder="Ingrese el nombre del producto"></textarea>
          </div>
          <div class="form-group">
            <label for="">Path del Producto</label>
            <input type="text" name="pathProductU" id="pathProductU" placeholder="Ingrese el path del producto" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Fecha Registro</label>
            <input type="date" name="dateRegisterU" id="dateRegisterU" class="form-control">
          </div>

          <div class="form-group">
            <label for="">Categoria</label>
            <select class="form-control" name="selectCategoryU" id="selectCategoryU">
              <option>Revista</option>
              <option>Libro</option>
              <option>Articulo 3</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Miembro</label>
            <select class="form-control" name="selectMemberU" id="selectMemberU">
              <option>Kevin</option>
              <option>Angel</option>
              <option>Mateo</option>
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