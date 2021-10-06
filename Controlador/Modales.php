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
    $id_product = $_POST['id_product'];
    $id_member = $_POST['id_member'];

    $libroYaAgregado = $this->modelo('Library_user');
    $existe = $libroYaAgregado->buscarProductoIDUser($id_product, $id_member);

    $consultas = $this->modelo('Product');
    $mensaje = $consultas->buscarProductoID($id_product);

    echo json_encode(array(
      "id_product" => $id_product,
      "consulta" => $mensaje,
      "libro_existe" => $existe
    ));
    // return true;
  }
}
