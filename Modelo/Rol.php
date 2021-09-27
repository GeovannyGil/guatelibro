<?php
require 'conexion.php';
class Rol
{
  public function buscarRol()
  {
    $modelo = new Conexion();
    $conexion = $modelo->obtener_conexion();
    $sql = "select * from rol";
    $estado = $conexion->prepare($sql);
    $estado->execute();

    while ($result = $estado->fetch()) {
      $rows[] = $result;
    }
    if (isset($rows)) {
      return $rows;
    }
  }

  public function buscarRolID($id_rol)
  {
    $modelo = new Conexion();
    $conexion = $modelo->obtener_conexion();
    $sql = "select * from rol where id_rol = :id_rol";
    $estado = $conexion->prepare($sql);
    $estado->bindParam(':id_rol', $id_rol);
    $estado->execute();

    while ($result = $estado->fetch()) {
      $rows[] = $result;
    }
    if (isset($rows)) {
      return $rows;
    }
  }


  public function InsertarRol($rol, $permits)
  {
    $modelo = new Conexion();
    $conexion = $modelo->obtener_conexion();
    $sql = "insert into rol(rol,permits) values(:rol,:permits)";
    $estado = $conexion->prepare($sql);
    $estado->bindParam(':rol', $rol);
    $estado->bindParam(':permits', $permits);

    if (!$estado) {
      return 'Error al guardar';
    } else {
      $estado->execute();
      return 'Datos guardados con exito';
    }
  }

  public function EliminarRol($id_rol)
  {
    $modelo = new Conexion();
    $conexion = $modelo->obtener_conexion();
    $sql = "delete from rol where id_rol=:id_rol";
    $estado = $conexion->prepare($sql);
    $estado->bindParam(':id_rol', $id_rol);

    if (!$estado) {
      return 'Error al eliminar';
    } else {
      $estado->execute();
      return  true;
    }
  }

  public function ActualizarRol($id_rol, $rol, $permits)
  {
    $modelo = new Conexion();
    $conexion = $modelo->obtener_conexion();
    $sql = "update rol set rol=:rol, permits = :permits where id_rol=:id_rol";
    $estado = $conexion->prepare($sql);
    $estado->bindParam(':rol', $rol);
    $estado->bindParam(':permits', $permits);
    $estado->bindParam(':id_rol', $id_rol);
    if (!$estado) {
      return 'Error al guardar';
    } else {
      $estado->execute();
      return true;
    }
  }
}
