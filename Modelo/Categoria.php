<?php
require 'conexion.php';
Class Categoria{
    public function buscarCategoria(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from category";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(isset($rows)){
            return $rows;
        }
        
    }

    public function InsertarCategoria($category){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into category(category) values(:category)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':category',$category);
        

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function EliminarCategoria($id_category){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="delete from category where id_category=:id_category";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_category',$id_category);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function ActualizarCategoria($category,$id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update category set category=:category where id_category=:id";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':category',$category);
        $estado->bindParam(':id',$id);

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }


}
?>