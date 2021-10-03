<?php
require 'Controlador.php';

class Modales extends Controlador
{
  /*Rol*/

  public function Rol()
  {
    $consultas = $this->modelo('Rol');
    $id_rol = $_POST['id_rol'];
    $mensaje = $consultas->buscarRolID($id_rol);
    echo json_encode(array(
      "id_rol" => $id_rol,
      "consulta" => $mensaje
    ));
    // return true;
  }

  public function Product()
  {
    $consultas = $this->modelo('Product');
    $id_product = $_POST['id_product'];
    $mensaje = $consultas->buscarProductoID($id_product);
    echo json_encode(array(
      "id_product" => $id_product,
      "consulta" => $mensaje
    ));
    // return true;
  }
}
