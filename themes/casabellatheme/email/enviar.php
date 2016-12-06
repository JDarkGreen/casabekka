<?php

	#Incluir wp load
	include '../../../../wp-load.php';
	$options = get_option("theme_settings");

	#Email soportado
	$admin_email = isset($options['theme_email_text']) && !empty($options['theme_email_text']) ? $options['theme_email_text'] : 'informes@segalconstruccion.com';
	
	
	//Obtenemos las valores enviados
	$name     = $_POST['name'];
	$lastname = isset( $_POST['lastname'] ) ? $_POST['lastname']  : "";
	$email    = $_POST['email'];
	$phone    = $_POST['phone'];
	$message  = $_POST['message'];

	$address = isset( $_POST['address'] ) ? $_POST['address']  : "";
	$subject = isset( $_POST['subject'] ) ? $_POST['subject']  : "";


	//Email A quien se le rinde cuentas
	$webmaster_email1 = $admin_email;

	/*
	 * Añadidos de Prueba
	 */
	$webmaster_email2 = "jgomez@ingenioart.com";

	include("class.phpmailer.php");
 	include("class.smtp.php");

	$mail = new PHPMailer();


	$mail->From     = $email;
	$mail->FromName = $name;
	$mail->AddAddress( $webmaster_email1 );

	/*
	 * Añadidos de Prueba
	 */
	$mail->AddAddress( $webmaster_email2 );


	$mail->IsHTML(true); // send as HTML

	$mail->Subject = 'Formulario Web: ' . utf8_decode( $subject );

	// Activar el almacenamiento en búfer de la salida
	ob_start();
		//Incluir Plantilla de Email
		include("template.php");
	//Devolver el contenido del búfer de salida
	$template_email = ob_get_contents();	
	//Limpiar (eliminar) el búfer de salida
	ob_clean();

	//Variable json encode exito 
	$result = array();
	$result['exito']   = 'ok';
	$result['message'] = '';

	//Customizar el mensaje
	$mail->Body = $template_email;

	if( $mail->Send() ){
		
		$result['message'] = "Su mensaje a sido enviado con éxito, estaremos respondiendo a la brevedad."; 

	} else {
		$result['exito']   = 'notok';
		$result['message'] = "Mailer Error: " . $mail->ErrorInfo ; 
	}

	echo json_encode( $result );
