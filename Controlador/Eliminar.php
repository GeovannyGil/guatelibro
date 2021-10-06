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

  /*Miembro*/
  public function members()
  {
    $consultas = $this->modelo('Members');
    $datos = $_POST['id_member'];
    $filas = $consultas->buscarMembersE($datos);
    if ($filas) {
      foreach ($filas as $fila) {
        $nombre_photo = $fila['photo'];
      }
    }
    echo json_encode($nombre_photo);
    unlink("assets/img/members/" . $nombre_photo);

    $consultas->EliminarMembers($datos);
    return true;
  }

  /*Payments*/
  public function payments()
  {
    $consultas = $this->modelo('Payments');
    $datos = $_POST['id_payments'];
    $mensaje = $consultas->EliminarPayments($datos);
    echo json_encode($mensaje);

    return true;
  }
  /*Payments*/
  public function suscription()
  {
    $consultas = $this->modelo('Suscription');
    $datos = $_POST['id_suscription'];
    $mensaje = $consultas->EliminarSuscription($datos);
    echo json_encode($mensaje);

    return true;
  }

  /*Library user*/
  public function library_user()
  {
    $consultas = $this->modelo('Library_user');
    $datos = $_POST['id_user'];
    $mensaje = $consultas->EliminarLibrery_user($datos);
    echo json_encode(array(
      "icon" => "success"
    ));
    return true;
  }

  /*Productos*/

  public function product()
  {
    $consultas = $this->modelo('Product');
    $id_product = $_POST['id_product'];
    $mensaje = $consultas->EliminarProducto($id_product);
    echo json_encode(array(
      "id_product" => $id_product,
      "consulta" => $mensaje
    ));
    // return true;
  }
}
