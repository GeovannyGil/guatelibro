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

    /*Categoria*/
    public function categoria()
    {
        $consultas = $this->modelo('Categoria');
        $id = $_POST['id_category'];
        $category = $_POST['category'];

        $mensaje = $consultas->ActualizarCategoria($category, $id);
        echo json_encode($mensaje);
        return true;
    }

    /*Membership*/
    public function membership()
    {
        $consultas = $this->modelo('Membership');
        $id = $_POST['id_membership'];
        $type_membership = $_POST['type_membership'];
        $price = $_POST['price'];
        $date_months = $_POST['date_months'];

        $mensaje = $consultas->ActualizarMembership($type_membership, $price, $date_months, $id);
        echo json_encode($mensaje);
        return true;
    }
}
