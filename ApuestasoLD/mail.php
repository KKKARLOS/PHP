<?php
$to = "jc.perdiguerocarlos@gmail.com";
	$subject = "Registro de cuenta";

	// compose headers
	
	// To send HTML mail, the Content-type header must be set
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: apuestas@apuestas.jc.bymhost.com\r\n";
	//$headers .= "Reply-To: apuestas@apuestas.jc.bymhost.com\r\n";
	//$headers .= "X-Mailer: PHP/".phpversion();

	// compose message
	$message = "Hola <strong>XXXX</strong>, le informamos que hemos procedido a registrar su usuario en nuestra aplicación de Apuestas. 
		<a href='http://apuestas.jc.bymhost.com/login.php'>Pinche el enlace http://apuestas.jc.bymhost.com/login.php</a>
		Un saludo y gracias.
    ";
	$message = wordwrap($message, 70);

	// send email
	if (mail($to, $subject, $message, $headers))
		echo "Enviado";
	else
		echo "Error";

?>