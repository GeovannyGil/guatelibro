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

    /*Paymets */
    public function payments()
    {
        $consultas = $this->modelo('Payments');
        $id_member = $_POST['id_member'];
        $id_membership = $_POST['id_membership'];
        $payment_type = $_POST['payment_type'];
        $payment = $_POST['payment'];

        $mensaje = $consultas->InsertarPayments($id_member, $id_membership, $payment_type, $payment);
        echo json_encode($mensaje);

        return true;
    }

    /*Producto*/
    public function product()
    {
        $consultas = $this->modelo('Product');
        $productName = $_POST['productName'];
        $selectMember = $_POST['selectMember'];
        $description = $_POST['description'];
        $dateRegister = $_POST['dateRegister'];
        $select_category = $_POST['select_category'];



        if ($_FILES['img-1']['name'] !== "" && $_FILES['file']['name'] !== '') {
            if (($_FILES['img-1']['type'] == "image/jpeg" || $_FILES['img-1']['type'] == "image/jpg" || $_FILES['img-1']['type'] == "image/png") && $_FILES['file']['type'] == "application/pdf") {

                $ruta = "assets/img/portadas/" . $_FILES['img-1']['name'];
                $imagen = $_FILES['img-1']['name'];

                $ruta_files = "assets/documents/" . $_FILES['file']['name'];
                $file = $_FILES['file']['name'];

                if (move_uploaded_file($_FILES['img-1']['tmp_name'], $ruta) && move_uploaded_file($_FILES['file']['tmp_name'], $ruta_files)) {
                    $mensaje = $consultas->InsertarProducto($productName, $selectMember, $description, $dateRegister, $select_category, $imagen, $file);
                    echo json_encode(array(
                        "type_message" => "success",
                        "message" => "Dato Registrado Correctamente",
                        "consulta" => $mensaje
                    ));
                }
            } else {
                echo json_encode(array(
                    "type_message" => "error",
                    "message" => "La imagen tiene que ser de tipo (png o jgp) y el documento de tipo (pdf).",
                    // "tipo_img" => $_FILES['img-1']['type'],
                    // "tipo_document" => $_FILES['file']['type']
                ));
            }
        } else {
            echo json_encode(array(
                "type_message" => "warning",
                "message" => "La portada o documento no pueden estar vacios"
            ));
        }
        // return true;
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

        if ($_FILES['img-1']['name'] != "") {
            $ruta = "assets/img/members/" . $_FILES['img-1']['name'];
            $photo = $_FILES['img-1']['name'];
            if (move_uploaded_file($_FILES['img-1']['tmp_name'], $ruta)) {
                $mensaje = $consultas->InsertarMembers($name_member, $surname_member, $email, $phone, $direction, $photo, $institution, $state, $user_member, $password,  $id_rol);
                echo json_encode($mensaje);
                return true;
            }
        }

        return true;
    }

    /*Library user */
    public function library_user()
    {
        $consultas = $this->modelo('Library_user');
        $id_member = $_POST['id_member'];
        $id_product = $_POST['id_product'];

        $mensaje = $consultas->InsertarLibrery_user($id_member, $id_product);
        echo json_encode($mensaje);

        return true;
    }

    public function correo($datos)
    {
        require 'Modelo/activar.php';
    }
}
