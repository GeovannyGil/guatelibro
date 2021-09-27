<?php
require "Controlador.php";
class Modificar extends Controlador
{


    /*Rol*/
    public function Rol()
    {
        $consultas = $this->modelo('Rol');
        $id_rol = $_POST['id_rol'];
        $rol = $_POST['rol'];
        $permits = $_POST['permits'];


        $mensaje = $consultas->ActualizarRol($id_rol, $rol, $permits);
        echo json_encode(array(
            "id_rol" => $id_rol,
            "respuesta" => $mensaje
        ));
        return true;
    }
}
