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

    /*Payments*/
    public function payments()
    {
        $consultas = $this->modelo('Payments');
        $id = $_POST['id_payments'];
        $id_member = $_POST['id_member'];
        $id_membership = $_POST['id_membership'];
        $payment_type = $_POST['payment_type'];
        $payment = $_POST['payment'];

        $mensaje = $consultas->ActualizarPayments($id_member, $id_membership, $payment_type, $payment, $id);
        echo json_encode($mensaje);
        return true;
    }

    /*Suscripciones*/
    public function suscription()
    {
        $consultas = $this->modelo('Suscription');
        $id_suscription = $_POST['id_suscription'];
        $id_payment = $_POST['id_paymentU'];
        $suscription_start = $_POST['suscription_startU'];
        $suscription_end = $_POST['suscription_endU'];
        $cancel_suscription = $_POST['cancel_suscriptionU'];
        $state = $_POST['stateU'];

        $mensaje = $consultas->ActualizarSuscription($id_payment, $suscription_start, $suscription_end, $cancel_suscription, $state, $id_suscription);
        echo json_encode($mensaje);
        // return true;
    }

    public function library_user()
    {
        $consultas = $this->modelo('Library_user');
        $id = $_POST['id_user'];
        $id_member = $_POST['selectMemberU'];
        $id_product = $_POST['selectProductU'];

        $mensaje = $consultas->ActualizarLibrery_user($id_member, $id_product, $id);
        echo json_encode(array(
            "id" => $id,
            "id_member" => $id_member,
            "id_product" => $id_product
        ));
        // return true;
    }

    /*Miembros*/
    public function members()
    {
        $consultas = $this->modelo('Members');
        $id = $_POST['id_member'];
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


        if ($_FILES['img-2']['name'] != "") {
            $ruta = "assets/img/members/" . $_FILES['img-2']['name'];
            $photo = $_FILES['img-2']['name'];
            if (move_uploaded_file($_FILES['img-2']['tmp_name'], $ruta)) {


                $mensaje = $consultas->ActualizarMembersI($name_member, $surname_member, $email, $phone, $direction, $photo, $institution, $state, $user_member, $password,  $id_rol, $id);
                echo json_encode($mensaje);
                return true;
            }
        } else {
            $mensaje = $consultas->ActualizarMembers($name_member, $surname_member, $email, $phone, $direction, $institution, $state, $user_member, $password,  $id_rol, $id);
            echo json_encode($mensaje);
            return true;
        }


        return true;
    }


    public function product()
    {
        $consultas = $this->modelo('Product');
        $id_product = $_POST['keyProduct'];
        $productName = $_POST['productNameU'];
        $selectMember = $_POST['selectMemberU'];
        $description = $_POST['descriptionU'];
        $dateRegister = $_POST['dateRegisterU'];
        $select_category = $_POST['selectCategoryU'];
        $image_antigua = '';
        $imagen = '';
        $file_document_antiguo = '';
        $file_document = '';

        $filas = $consultas->buscarProductoID($id_product);
        foreach ($filas as $fila) {
            $image_antigua = $fila['image_product'];
            $file_document_antiguo = $fila['path_product'];
        }

        // echo json_encode(array(
        //     // "type_message" => "success",
        //     // "message" => "Dato Registrado Correctamente",
        //     "consulta" => $filas,
        //     "imagen_a" => $image_antigua,
        //     "file-a" => $file_document_antiguo
        // ));

        if ($_FILES['img-2']['name'] == '') {
            $imagen = $image_antigua;
        } else {
            if ($_FILES['img-2']['type'] == "image/jpeg" || $_FILES['img-2']['type'] == "image/jpg" || $_FILES['img-2']['type'] == "image/png") {
                $ruta = "assets/img/portadas/" . $_FILES['img-2']['name'];
                $imagenInclude = $_FILES['img-2']['name'];
                move_uploaded_file($_FILES['img-2']['tmp_name'], $ruta);
            } else {
                echo json_encode(array(
                    "type_message" => "error",
                    "message" => "La imagen tiene que ser en formato (png o jpg)"
                    // "consulta" => $mensaje
                ));
                exit;
            }
        }

        if ($_FILES['file2']['name'] == '') {
            $file_document = $file_document_antiguo;
        } else {
            if ($_FILES['file2']['type'] == "application/pdf") {
                $ruta_files = "assets/documents/" . $_FILES['file2']['name'];
                $file_include = $_FILES['file2']['name'];
                move_uploaded_file($_FILES['file2']['tmp_name'], $ruta_files);
            } else {
                echo json_encode(array(
                    "type_message" => "error",
                    "message" => "El documento tiene que ser en formato .pdf"
                    // "consulta" => $mensaje
                ));
                exit;
            }
        }


        if ($imagen !== '' && $file_document !== '') {
            $mensaje = $consultas->ActualizarProducto($id_product, $productName, $selectMember, $description, $dateRegister, $select_category, $imagen, $file_document);
        } else if ($imagen === '' && $file_document === '') {
            $mensaje = $consultas->ActualizarProducto($id_product, $productName, $selectMember, $description, $dateRegister, $select_category, $imagenInclude, $file_include);
        } else if ($imagen === '' && $file_document !== '') {
            $mensaje = $consultas->ActualizarProducto($id_product, $productName, $selectMember, $description, $dateRegister, $select_category, $imagenInclude, $file_document);
        } else if ($imagen !== '' && $file_document === '') {
            $mensaje = $consultas->ActualizarProducto($id_product, $productName, $selectMember, $description, $dateRegister, $select_category, $imagen, $file_include);
        }

        echo json_encode(array(
            "type_message" => "success",
            "message" => "Dato Registrado Correctamente",
            "consulta" => $mensaje
        ));
    }
}
