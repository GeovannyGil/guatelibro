<?php
require "Controlador.php";
class Modificar extends Controlador
{


    /*Rol*/
    public function Rol()
    {
        $consultas = $this->modelo('Rol');
        $id_rol = $_POST['id_rol'];
        $rol = $_POST['rol'];
        $permits = $_POST['permits'];


        $mensaje = $consultas->ActualizarRol($id_rol, $rol, $permits);
        echo json_encode(array(
            "id_rol" => $id_rol,
            "respuesta" => $mensaje
        ));
        return true;
    }

    /*Categoria*/
    public function categoria()
    {
        $consultas = $this->modelo('Categoria');
        $id = $_POST['id_category'];
        $category = $_POST['category'];

        $mensaje = $consultas->ActualizarCategoria($category, $id);
        echo json_encode($mensaje);
        return true;
    }

    /*Membership*/
    public function membership()
    {
        $consultas = $this->modelo('Membership');
        $id = $_POST['id_membership'];
        $type_membership = $_POST['type_membership'];
        $price = $_POST['price'];
        $date_months = $_POST['date_months'];

        $mensaje = $consultas->ActualizarMembership($type_membership, $price, $date_months, $id);
        echo json_encode($mensaje);
        return true;
    }

        /*Miembros*/
    public function members(){
        $consultas=$this->modelo('Members');
        $id=$_POST['id_member'];
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
      

        if($_FILES['img-2']['name']!=""){
            $ruta="assets/img/members/".$_FILES['img-2']['name'];
            $photo=$_FILES['img-2']['name'];
            if(move_uploaded_file($_FILES['img-2']['tmp_name'],$ruta)){
             
                   
                      $mensaje=$consultas->ActualizarMembersI($name_member, $surname_member, $email, $phone,$direction, $photo, $institution,$state, $user_member, $password,  $id_rol,$id);
                      echo json_encode($mensaje);           
                      return true;
                  }
                  
               
        }else{            
                $mensaje=$consultas->ActualizarMembers($name_member, $surname_member, $email, $phone,$direction, $institution,$state, $user_member, $password,  $id_rol,$id);
                echo json_encode($mensaje);        
                return true;
        }

        
        return true;
    }
}
