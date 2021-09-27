<?php 
require 'servidor/php-activerecord/ActiveRecord.php';
require 'servidor/Mailer/PHPMailerAutoload.php';


function enviarMail($destinatarios,$asunto,$mensaje){
	$mail = new PHPMailer;
$mail->isSMTP();                                      // Activamos SMTP para mailer
$mail->Host = 'smtp.gmail.com';                       // Especificamos el host del servidor SMTP
$mail->SMTPAuth = true;                               // Activamos la autenticacion
$mail->Username = 'benitocarlosdeleon01@gmail.com';       // Correo SMTP
$mail->Password = '41029801';                // Contraseña SMTP
$mail->SMTPSecure = 'ssl';                            // Activamos la encriptacion ssl
$mail->Port = 465;                                    // Seleccionamos el puerto del SMTP
$mail->From = 'benitocarlosdeleon01@gmail.com';
$mail->FromName = 'Angel Teret';                       // Nombre del que envia el correo
$mail->isHTML(true); //Decimos que lo que enviamos es HTML
$mail->CharSet = 'UTF-8';  // Configuramos el charset 


	//Agregamos a todos los destinatarios
	foreach ($destinatarios as $correo => $nombre) {
		$mail->addAddress($correo,$nombre);
	}
	
	//Añadimos el asunto del mail
	$mail->Subject = $asunto; 

	//Mensaje del email
	$mail->Body    = '<div align="center"><img src="../assets/img/logo_zapato.png"></div><br><br>'.
	$mensaje;

	//comprobamos si el mail se envio correctamente y devolvemos la respuesta al servidor
	if(!$mail->send()) {
		return false;
	} else {
		return true;
	} 
}


?>