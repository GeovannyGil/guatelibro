<?php
require 'Controlador.php';

class Insertar extends Controlador
{
    /*Rol*/
    public function rol()
    {
        $consultas = $this->modelo('Rol');
        $rol = $_POST['rol'];
        $permits = $_POST['permits'];

        $mensaje = $consultas->InsertarRol($rol, $permits);

        echo json_encode(array(
            "respuesta" => true,
            "rol" => $rol,
            "permisos" => $permits,
            "consulta" => $mensaje
        ));
        // echo json_encode($mensaje);s
        // return true;
    }

    /*Categoria */
    public function categoria()
    {
        $consultas = $this->modelo('Categoria');
        $category = $_POST['category'];

        $mensaje = $consultas->InsertarCategoria($category);
        echo json_encode($mensaje);

        return true;
    }

    /*Membership */
    public function membership()
    {
        $consultas = $this->modelo('Membership');
        $type_membership = $_POST['type_membership'];
        $price = $_POST['price'];
        $date_months = $_POST['date_months'];

        $mensaje = $consultas->InsertarMembership($type_membership, $price, $date_months);
        echo json_encode($mensaje);

        return true;
    }

    /*Members */
    public function members()
    {
        $consultas = $this->modelo('Members');
        $name_member = $_POST['name_member'];
        $surname_member = $_POST['surname_member'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $direction = $_POST['direction'];
        $institution = $_POST['institution'];
        $state = $_POST['state'];
        $user_member = $_POST['user_member'];
        $password = $_POST['password'];
        $id_rol = $_POST['id_rol'];

        if($_FILES['img-1']['name']!=""){
            $ruta="assets/img/members/".$_FILES['img-1']['name'];
            $photo=$_FILES['img-1']['name'];
            if(move_uploaded_file($_FILES['img-1']['tmp_name'],$ruta)){
                $mensaje = $consultas->InsertarMembers($name_member, $surname_member, $email, $phone,$direction, $photo, $institution,$state, $user_member, $password,  $id_rol);
                echo json_encode($mensaje);            
                return true;
            }
        }

        return true;
    }

    public function correo($datos)
    {
        require 'Modelo/activar.php';
    }
}
