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
}
