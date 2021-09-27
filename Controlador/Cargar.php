<?php
class Cargar extends Controlador
{
    /******************Rol*************/
    public function Rol()
    {
        $consultas = $this->modelo('Rol');

        $filas = $consultas->buscarRol();
        echo '
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-bg1">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Permisos</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <tr>
                        <th scope="row">' . $fila['id_rol'] . '</th>
                        <td>' . $fila['rol'] . '</td>
                        <td>';

                $permisos = json_decode($fila['permits']);
                foreach ($permisos as $permiso) {
                    echo '<span class="badge btn-primary-gt letter-large m-2">' . $permiso . '</span>';
                };


                echo '</td>    
                        <td>                
                        <button class="btn btn-secondary-gt" onclick="deleteRegister(' . $fila['id_rol'] . ')"><i class="fas fa-trash"></i></button>
                        <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt" onclick="cargarDatos(' . $fila['id_rol'] . ')"><i class="fas fa-edit"></i></button>
                        </td> 
                    </tr>
                ';
            }
        }
        echo '<tbody></table>';
    }

    public function buscarRol()
    {
        $consultas = $this->modelo('Rol');
        $filas = $consultas->buscarRol();
        return $filas;
    }


    /*Categoria*/
    public function categoria()
    {
        $consultas = $this->modelo('Categoria');

        $filas = $consultas->buscarCategoria();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Categoria</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <tr>
                        <td>' . $fila['id_category'] . '</td>
                        <td>' . $fila['category'] . '</td>                    
                        <td><button onclick="mostrar_msg(' . $fila['id_category'] . ');" class="btn btn-secondary-gt"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar' . $fila['id_category'] . '" onclick="cargar(' . $fila['id_category'] . ')"; class="btn btn-secondary-gt" data-toggle="modal" data-target="#actualizarCategoria"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function buscarCategoria()
    {
        $consultas = $this->modelo('Categoria');
        $filas = $consultas->buscarCategoria();
        return $filas;
    }

    /*Membership*/
    public function membership()
    {
        $consultas = $this->modelo('Membership');

        $filas = $consultas->buscarMembership();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tipo Membresia</th>
                        <th>Precio</th>
                        <th>No. Meses</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <tr>
                        <td>' . $fila['id_membership'] . '</td>
                        <td>' . $fila['type_membership'] . '</td>     
                        <td>' . $fila['price'] . '</td>    
                        <td>' . $fila['date_months'] . '</td>                 
                        <td><button onclick="mostrar_msg(' . $fila['id_membership'] . ');" class="btn btn-secondary-gt"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar' . $fila['id_membership'] . '" onclick="cargar(' . $fila['id_membership'] . ')"; class="btn btn-secondary-gt" data-toggle="modal" data-target="#actualizarMembership"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function buscarMembership()
    {
        $consultas = $this->modelo('Membership');
        $filas = $consultas->buscarMembership();
        return $filas;
    }
}
