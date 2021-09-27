<?php
require 'conexion.php';
Class Membership{
    public function buscarMembership(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from membership";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(isset($rows)){
            return $rows;
        }
        
    }

    public function InsertarMembership($type_membership,$price,$date_months){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into membership(type_membership, price, date_months) values(:type_membership, :price, :date_months)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':type_membership',$type_membership);
        $estado->bindParam(':price',$price);
        $estado->bindParam(':date_months',$date_months);
        

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    
    public function EliminarMembership($id_membership){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="delete from membership where id_membership=:id_membership";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_membership',$id_membership);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function ActualizarMembership($type_membership,$price,$date_months,$id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update membership set type_membership=:type_membership, price=:price, date_months = :date_months  where id_membership	=:id";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':type_membership',$type_membership);
        $estado->bindParam(':price',$price);
        $estado->bindParam(':date_months',$date_months);
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