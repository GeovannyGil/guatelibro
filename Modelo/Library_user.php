<?php
require_once 'conexion.php';
class Library_user
{
    public function buscarLibrery_user()
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "select * from library_user";
        $estado = $conexion->prepare($sql);
        $estado->execute();

        while ($result = $estado->fetch()) {
            $rows[] = $result;
        }
        if (isset($rows)) {
            return $rows;
        }
    }

    public function InsertarLibrery_user($id_member, $id_product)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "insert into library_user(id_member, id_product) values(:id_member,:id_product)";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_member', $id_member);
        $estado->bindParam(':id_product', $id_product);

        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function EliminarLibrery_user($id_user)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "delete from library_user where id_user=:id_user";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_user', $id_user);

        if (!$estado) {
            return 'Error al eliminar';
        } else {
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function ActualizarLibrery_user($id_member, $id_product, $id)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "update library_user set id_member=:id_member, id_product=:id_product where id_user=:id";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_member', $id_member);
        $estado->bindParam(':id_product', $id_product);
        $estado->bindParam(':id', $id);

        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
}
