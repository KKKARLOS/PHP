<?php

//Recogemos los datos del formulario:
$edad = $_POST["edad"];
//Comprobar si es mayor de edad:
if ($edad<18) {
	//Redirijo a la pagina 1 con un mensaje de error:
	header("Location:pagina1.php?msg=Acceso no permitido&edad=$edad");
}
?>
<html>
	<body>
		<h3>
		<?php
		$email = $_POST["email"];
		//Mostramos en pantalla:
		echo "Tienes $edad años y tu email es: $email";
		?>
		</h3>
	</body>
</html>