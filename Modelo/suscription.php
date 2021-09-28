<?php
require_once 'conexion.php';

class Suscription
{
    public function buscarSuscription()
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "select * from suscriptions";
        $estado = $conexion->prepare($sql);
        $estado->execute();

        while ($result = $estado->fetch()) {
            $rows[] = $result;
        }
        if (isset($rows)) {
            return $rows;
        }
    }

    public function InsertarSuscripcion($id_payment, $suscription_start, $suscription_end, $cancel_suscription, $state)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "insert into suscriptions(id_payments, subscription_start, subscription_end, date_cancel, state) values(:id_payments, :subscription_start, :subscription_end, :date_cancel, :state)";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_payments', $id_payment);
        $estado->bindParam(':subscription_start', $suscription_start);
        $estado->bindParam(':subscription_end', $suscription_end);
        $estado->bindParam(':date_cancel', $cancel_suscription);
        $estado->bindParam(':state', $state);


        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function EliminarSuscription($id_suscription)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "delete from suscriptions where id_suscription=:id_suscription";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_suscription', $id_suscription);

        if (!$estado) {
            return 'Error al eliminar';
        } else {
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function ActualizarSuscription($id_payment, $suscription_start, $suscription_end, $cancel_suscription, $state, $id_suscription)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "update suscriptions set id_payments=:id_payments, subscription_start=:subscription_start, subscription_end=:subscription_end, date_cancel=:date_cancel, state=:state where id_suscription=:id_suscription";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_payments', $id_payment);
        $estado->bindParam(':subscription_start', $suscription_start);
        $estado->bindParam(':subscription_end', $suscription_end);
        $estado->bindParam(':date_cancel', $cancel_suscription);
        $estado->bindParam(':state', $state);
        $estado->bindParam(':id_suscription', $id_suscription);

        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
}
