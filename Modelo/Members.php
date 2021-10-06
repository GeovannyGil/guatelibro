<?php
require_once 'conexion.php';
class Members
{
    public function buscarMembers()
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "select * from members";
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

    public function buscarMembersE($id)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "select photo from members where id_member=:id_member";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_member', $id);

        $estado->execute();

        while ($result = $estado->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function buscarMembersEmail($correo)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "select email from members where email =:email";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':email', $correo);

        $estado->execute();

        while ($result = $estado->fetch()) {
            $rows[] = $result;
        }
        return isset($rows) ? $rows : "user_not_found";
    }

    public function buscarMemberVerification($email_member, $password_member)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "select m.*, r.rol as rol_member, r.permits as permisos_member from members as m INNER JOIN rol as r ON m.id_rol = r.id_rol where m.email=:email_member and m.password = :password_member";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':email_member', $email_member);
        $estado->bindParam(':password_member', $password_member);

        $estado->execute();

        while ($result = $estado->fetch()) {
            $rows[] = $result;
        }

        return isset($rows) ? $rows : "user_not_found";
    }

    public function InsertarMembers($name_member, $surname_member, $email, $phone, $direction, $photo, $institution, $state, $user_member, $password, $id_rol)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "insert into members(name_member,surname_member,email,phone, direction,photo,institution,state,user_member,password,id_rol) values(:name_member,:surname_member,:email,:phone, :direction,:photo,:institution, :state, :user_member, :password, :id_rol)";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':name_member', $name_member);
        $estado->bindParam(':surname_member', $surname_member);
        $estado->bindParam(':email', $email);
        $estado->bindParam(':phone', $phone);
        $estado->bindParam(':direction', $direction);
        $estado->bindParam(':photo', $photo);
        $estado->bindParam(':institution', $institution);
        $estado->bindParam(':state', $state);
        $estado->bindParam(':user_member', $user_member);
        $estado->bindParam(':password', $password);
        $estado->bindParam(':id_rol', $id_rol);

        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function registrarMiembro($name_member, $surname_member, $email, $password, $rol)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "insert into members(name_member,surname_member,email,state,password,id_rol) values(:name_member,:surname_member,:email, 1, :password, :id_rol)";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':name_member', $name_member);
        $estado->bindParam(':surname_member', $surname_member);
        $estado->bindParam(':email', $email);
        $estado->bindParam(':password', $password);
        $estado->bindParam(':id_rol', $rol);

        if (!$estado) {
            return array('error', 'Hubo un error al registrar la cuenta');
        } else {
            $estado->execute();
            return array('success', 'Se registro la cuenta correctamente');
        }
    }

    public function EliminarMembers($id_member)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "delete from members where id_member=:id_member";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':id_member', $id_member);

        if (!$estado) {
            return 'Error al eliminar';
        } else {
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function ActualizarMembersI($name_member, $surname_member, $email, $phone, $direction, $photo, $institution, $state, $user_member, $password, $id_rol, $id)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "update members set name_member=:name_member, surname_member=:surname_member,email=:email, phone=:phone, direction=:direction, photo=:photo, institution=:institution,state=:state, user_member=:user_member, password=:password,id_rol=:id_rol where id_member=:id";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':name_member', $name_member);
        $estado->bindParam(':surname_member', $surname_member);
        $estado->bindParam(':email', $email);
        $estado->bindParam(':phone', $phone);
        $estado->bindParam(':direction', $direction);
        $estado->bindParam(':photo', $photo);
        $estado->bindParam(':institution', $institution);
        $estado->bindParam(':state', $state);
        $estado->bindParam(':user_member', $user_member);
        $estado->bindParam(':password', $password);
        $estado->bindParam(':id_rol', $id_rol);
        $estado->bindParam(':id', $id);
        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function ActualizarMembers($name_member, $surname_member, $email, $phone, $direction, $institution, $state, $user_member, $password, $id_rol, $id)
    {
        $modelo = new Conexion();
        $conexion = $modelo->obtener_conexion();
        $sql = "update members set name_member=:name_member, surname_member=:surname_member,email=:email, phone=:phone, direction=:direction, institution=:institution,state=:state, user_member=:user_member, password=:password,id_rol=:id_rol where id_member=:id";
        $estado = $conexion->prepare($sql);
        $estado->bindParam(':name_member', $name_member);
        $estado->bindParam(':surname_member', $surname_member);
        $estado->bindParam(':email', $email);
        $estado->bindParam(':phone', $phone);
        $estado->bindParam(':direction', $direction);
        $estado->bindParam(':institution', $institution);
        $estado->bindParam(':state', $state);
        $estado->bindParam(':user_member', $user_member);
        $estado->bindParam(':password', $password);
        $estado->bindParam(':id_rol', $id_rol);
        $estado->bindParam(':id', $id);
        if (!$estado) {
            return 'Error al guardar';
        } else {
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
}
