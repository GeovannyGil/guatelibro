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

    public function selectCategoria()
    {
        $consultas = $this->modelo('Categoria');
        $filas = $consultas->buscarCategoria();
        echo '<select class="form-control" name="select_category" id="select_category">';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<option value="' . $fila['id_category'] . '">' . $fila['category'] . '</option>';
            }
        }
        echo '</select>';
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

     public function selectRol()
     {
         $consultas = $this->modelo('Rol');
         $filas = $consultas->buscarRol();
         echo '<select class="form-control" name="id_rol" id="id_rol">';
            if ($filas) {
                foreach ($filas as $fila) {
                    echo '<option value="' . $fila['id_rol'] . '">' . $fila['rol'] . '</option>';
                }
            }
         echo '</select>';
    }


    /*Usuarios*/
    public function memberbers()
    {
        $consultas = $this->modelo('Members');

        $filas = $consultas->buscarMembers();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Foto</th>
                        <th>Institución</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Estado</th>
                        <th>Rol</th>
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
                        <td>' . $fila['id_member'] . '</td>
                        <td>' . $fila['name_member'] . '</td>     
                        <td>' . $fila['surname_member'] . '</td>    
                        <td>' . $fila['email'] . '</td>
                        <td>' . $fila['phone'] . '</td>    
                        <td>' . $fila['direction'] . '</td>
                        <td><img src="../assets/img/members/'.$fila['photo'].'" class="img-fluid" width=60 height=4 alt="'.$fila['photo'].'" id="photo'.$fila['id_member'].'"></td>                 
                        <td>' . $fila['institution'] . '</td>
                        <td>' . $fila['user_member'] . '</td>
                        <td>' . $fila['password'] . '</td>
                        <td>' . $fila['state'] . '</td>
                        <td>' . $fila['id_rol'] . '</td>
                        <td><button onclick="mostrar_msg(' . $fila['id_member'] . ');" class="btn btn-secondary-gt"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar' . $fila['id_member'] . '" onclick="cargar(' . $fila['id_member'] . ')"; class="btn btn-secondary-gt" data-toggle="modal" data-target="#actualizarMembers"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function buscarMembers()
    {
        $consultas = $this->modelo('Members');
        $filas = $consultas->buscarMembers();
        return $filas;
    }
    
    
}
