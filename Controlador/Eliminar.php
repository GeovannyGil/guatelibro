<?php
require 'Controlador.php';

class Eliminar extends Controlador
{
  /*Rol*/

  public function Rol()
  {
    $consultas = $this->modelo('Rol');
    $id_rol = $_POST['id_rol'];
    $mensaje = $consultas->EliminarRol($id_rol);
    echo json_encode(array(
      "id_rol" => $id_rol,
      "consulta" => $mensaje
    ));
    // return true;
  }

  /*Categoria*/

  public function categoria()
  {
    $consultas = $this->modelo('Categoria');
    $datos = $_POST['id_category'];
    $mensaje = $consultas->EliminarCategoria($datos);
    echo json_encode($mensaje);

    return true;
  }

  /*Membership*/

  public function membership()
  {
    $consultas = $this->modelo('Membership');
    $datos = $_POST['id_membership'];
    $mensaje = $consultas->EliminarMembership($datos);
    echo json_encode($mensaje);

    return true;
  }
}
