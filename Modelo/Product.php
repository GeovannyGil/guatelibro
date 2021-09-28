<?php
require_once 'conexion.php';
class Product
{
    // public function buscarZapato()
    // {
    //     $modelo = new Conexion();
    //     $conexion = $modelo->obtener_conexion();
    //     $sql = "select * from zapato";
    //     $estado = $conexion->prepare($sql);
    //     $estado->execute();

    //     while ($result = $estado->fetch()) {
    //         $rows[] = $result;
    //     }
    //     if (isset($rows)) {
    //         return $rows;
    //     } else {
    //         return null;
    //     }
    // }

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
}
