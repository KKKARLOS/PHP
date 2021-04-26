<?php
	$edad = $_POST['txtEdad'];
	if ($edad<18) {
		header("Location:origen.php?mensaje=Acceso no permitido&edad=$edad");
	}
?>
<html>
<body>
<?php
		$email = $_POST['txtEmail'];
		print "<h1>Tu edad es <strong>$edad, y tu email es $email</strong></h1>";
?>		
</body>
</html>
