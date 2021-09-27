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
}
