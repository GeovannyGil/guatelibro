<?php
require 'Controlador.php';

class Verificar extends Controlador
{
    public function usuario()
    {
        $consultas = $this->modelo('Members');
        $consultas2 = $this->modelo('Payments');
        $email_member = $_POST['email_member'];
        $password_member = $_POST['password_member'];
        // $incorrecto = false;
        $filas = $consultas->buscarMemberVerification($email_member, $password_member);


        if ($filas !== "user_not_found") {
            foreach ($filas as $fila) {
                if (($email_member == $fila['email']) && ($password_member == $fila['password'])) {
                    if ($fila['state'] != 0) {
                        session_start();
                        $_SESSION['id_member'] = $fila['id_member'];
                        //SUSCRIPTION
                        $suscription = $consultas2->buscarPaymentsMember($_SESSION['id_member']);
                        if ($suscription == null) {
                            $_SESSION['suscription'] = NULL;
                        } else {
                            $_SESSION['suscription'] = true;
                        }



                        //SUSCRIPTION
                        $_SESSION['name_member'] = $fila['name_member'];
                        $_SESSION['surname_member'] = $fila['surname_member'];
                        $_SESSION['email'] = $fila['email'];
                        $_SESSION['phone'] = $fila['phone'];
                        $_SESSION['email'] = $fila['email'];
                        $_SESSION['direction'] = $fila['direction'];
                        $_SESSION['photo'] = $fila['photo'];
                        $_SESSION['institution'] = $fila['institution'];
                        $_SESSION['state'] = $fila['state'];
                        $_SESSION['user_member'] = $fila['user_member'];
                        // $_SESSION['password'] = $fila['password'];
                        $_SESSION['id_rol'] = $fila['id_rol'];
                        $_SESSION['rol'] = $fila['rol_member'];
                        $_SESSION['permisos'] = $fila['permisos_member'];
                        // $_SESSION['state_suscription'] = $fila['state_suscription'];
                        // $_SESSION['date_suscription_end'] = $fila['date_suscription_end'];
                        // $incorrecto = false;
                        echo json_encode(array(
                            "title" => 'Exito!',
                            "message" => 'Bienvenido',
                            "type_message" => "success"
                        ));
                        return true;
                    }
                    echo json_encode(array(
                        "title" => 'Aviso!',
                        "message" => 'Esta cuenta esta desactivada',
                        "type_message" => "warning"
                    ));
                    // exit;
                    return true;
                }
                // else {
                //     $incorrecto = true;
                // }
            }
        } else {
            echo json_encode(array(
                "title" => 'Aviso!',
                "message" => 'No hay ningun usuario registrado con estos datos',
                "type_message" => "warning"
            ));
            return true;
        }
    }

    public function verificar_correo()
    {
        $consultas = $this->modelo('Members');
        $email_member = $_POST['email_memberR'];

        $existe = $consultas->buscarMembersEmail($email_member);
        echo json_encode(array(
            "email" => $existe
        ));
    }


    public function register_usuario()
    {
        $consultas = $this->modelo('Members');
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email_member = $_POST['email_memberR'];
        $passwordR = $_POST['passwordR'];
        $id_rol = $_POST['id_rol'];

        $registrado = $consultas->registrarMiembro($name, $surname, $email_member, $passwordR, $id_rol);
        echo json_encode(array(
            "icon" => $registrado[0],
            "message" => $registrado[1]
        ));
    }
}
