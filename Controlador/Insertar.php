<?php
require 'Controlador.php';

class Insertar extends Controlador
{
    /*Rol*/
    public function rol()
    {
        $consultas = $this->modelo('Rol');
        $rol = $_POST['rol'];
        $permits = $_POST['permits'];

        $mensaje = $consultas->InsertarRol($rol, $permits);

        echo json_encode(array(
            "respuesta" => true,
            "rol" => $rol,
            "permisos" => $permits,
            "consulta" => $mensaje
        ));
        // echo json_encode($mensaje);s
        // return true;
    }

    /*Categoria */
    public function categoria()
    {
        $consultas = $this->modelo('Categoria');
        $category = $_POST['category'];

        $mensaje = $consultas->InsertarCategoria($category);
        echo json_encode($mensaje);

        return true;
    }

    /*Membership */
    public function membership()
    {
        $consultas = $this->modelo('Membership');
        $type_membership = $_POST['type_membership'];
        $price = $_POST['price'];
        $date_months = $_POST['date_months'];

        $mensaje = $consultas->InsertarMembership($type_membership, $price, $date_months);
        echo json_encode($mensaje);

        return true;
    }

    public function correo($datos)
    {
        require 'Modelo/activar.php';
    }
}
