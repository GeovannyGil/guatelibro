<?php
require 'Controlador.php';

class Verificar extends Controlador
{
    public function usuario()
    {
        $consultas = $this->modelo('Members');
        $email_member = $_POST['email_member'];
        $password_member = $_POST['password_member'];
        $incorrecto = false;
        $filas = $consultas->buscarMemberVerification($email_member, $password_member);

        if ($filas) {
            foreach ($filas as $fila) {
                if (($email_member == $fila['email']) && ($password_member == $fila['password'])) {
                    if ($fila['state'] != 0) {
                        session_start();
                        $_SESSION['id_member'] = $fila['id_member'];
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
                        $incorrecto = false;
                        echo json_encode(array(
                            "title" => '¡Éxito!',
                            "message" => 'Bienvenido',
                            "type_message" => "success"
                        ));
                        return true;
                    }
                    echo json_encode(array(
                        "title" => 'Aviso!',
                        "message" => 'Esta cuenta no ha sido activada, vaya a su correo y dele click en el enlace',
                        "type_message" => "warning"
                    ));
                    // exit;
                    return true;
                } else {
                    $incorrecto = true;
                }
            }
        } else {
            echo json_encode(array(
                "title" => 'Aviso!',
                "message" => 'No hay ningun usuario registrado con estos datos',
                "type_message" => "warning"
            ));
            return true;
        }

        if ($incorrecto == true) {
            echo json_encode(array(
                "title" => 'Error!',
                "message" => 'Correo o contraseña incorrecta',
                "icon" => "error"
            ));
        }
    }
}
