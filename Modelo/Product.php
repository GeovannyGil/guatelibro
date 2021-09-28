<?php
require_once 'conexion.php';
class Product
{
    public function buscarProducto()
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "select * from product";
        $estado = $conexion->prepare($sql);
        $estado->execute();

        while ($result = $estado->fetch()) {
            $rows[] = $result;
        }
        if (isset($rows)) {
            return $rows;
        } else {
            return null;
        }
    }

    public function buscarProductoID($id_product)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "select * from product where id_product = :id_product";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_product', $id_product);
        $estado->execute();

        while ($result = $estado->fetch()) {
            $rows[] = $result;
        }
        if (isset($rows)) {
            return $rows;
        } else {
            return null;
        }
    }

    public function
    InsertarProducto($productName, $selectMember, $description, $dateRegister, $select_category, $imagen, $file)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "insert into product(name_product,description_product,path_product,image_product,date_register,id_category,id_member) values(:name_product,:description_product,:path_product,:image_product,:date_register,:id_category,:id_member)";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':name_product', $productName);
        $estado->bindParam(':description_product', $description);
        $estado->bindParam(':path_product', $file);
        $estado->bindParam(':image_product', $imagen);
        $estado->bindParam(':date_register', $dateRegister);
        $estado->bindParam(':id_category', $select_category);
        $estado->bindParam(':id_member', $selectMember);

        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function EliminarProducto($id_product)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "delete from product where id_product=:id_product";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_product', $id_product);

        if (!$estado) {
            return 'Error al eliminar';
        } else {
            $estado->execute();
            return true;
        }
    }

    public function ActualizarProducto($id_product, $productName, $selectMember, $description, $dateRegister, $select_category, $imagen, $file)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "update product set name_product=:name_product, description_product=:description_product,path_product=:path_product, image_product=:image_product, date_register=:date_register, id_category=:id_category,id_member=:id_member where id_product=:id_product";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':name_product', $productName);
        $estado->bindParam(':description_product', $description);
        $estado->bindParam(':path_product', $file);
        $estado->bindParam(':image_product', $imagen);
        $estado->bindParam(':date_register', $dateRegister);
        $estado->bindParam(':id_category', $select_category);
        $estado->bindParam(':id_member', $selectMember);
        $estado->bindParam(':id_product', $id_product);
        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return true;
        }
    }
}
