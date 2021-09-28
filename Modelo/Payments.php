<?php
require_once 'conexion.php';

class Payments
{
    public function buscarPayments()
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "select * from payments";
        $estado = $conexion->prepare($sql);
        $estado->execute();

        while ($result = $estado->fetch()) {
            $rows[] = $result;
        }
        if (isset($rows)) {
            return $rows;
        }
    }

    public function InsertarPayments($id_member, $id_membership, $payment_type, $payment)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "insert into payments(id_member, id_membership, payment_type, payment) values(:id_member, :id_membership, :payment_type, :payment)";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_member', $id_member);
        $estado->bindParam(':id_membership', $id_membership);
        $estado->bindParam(':payment_type', $payment_type);
        $estado->bindParam(':payment', $payment);


        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function EliminarPayments($id_payments)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "delete from payments where id_payments=:id_payments";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_payments', $id_payments);

        if (!$estado) {
            return 'Error al eliminar';
        } else {
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function ActualizarPayments($id_member, $id_membership, $payment_type, $payment, $id)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "update payments set id_member=:id_member, id_membership=:id_membership, payment_type=:payment_type, payment=:payment  where id_payments=:id";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_member', $id_member);
        $estado->bindParam(':id_membership', $id_membership);
        $estado->bindParam(':payment_type', $payment_type);
        $estado->bindParam(':payment', $payment);
        $estado->bindParam(':id', $id);

        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
}
