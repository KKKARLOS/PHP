<?php session_start();
require("conexionbd.php");

// Declaración de la función de usuario para validar el acceso
function validarAcceso($email,$password)
{
	//Passwords validos aquellos de longitud mayor que 3 caractares y numero par terminado en .net y .com.
	$valido=false;
	if (is_numeric($password)){
		$resto=$password%2;
		$longitud=strlen($password);

		if ($resto==0&&$longitud>=4){
			if (
				(strpos($_POST["txtEmail"], '.net'))
				or
				(strpos($_POST["txtEmail"], '.com'))
			    )			
			{
				//$total = mysqli_affected_rows($conexion);
				//Para poder usar la variable conexión (variable global):
				global $conexion;
				$consulta = "select nombre, rol from usuarios where email = '$email' and password = '$password'";
	//echo $consulta;			
				$datos = mysqli_query($conexion,$consulta);
				$fila = mysqli_fetch_assoc($datos);

				$_SESSION["rol"] = $fila["rol"];
	//echo "Rol".$_SESSION["rol"];

				$_SESSION["nombre"] = $fila["nombre"];
	//echo " Nombre".$_SESSION["nombre"];				

				$total = mysqli_affected_rows($conexion);
	
				if($total>0) $valido=true;			
			}			
		}		
	}
	//echo "Valido: $valido";	
	return $valido;		
}

function insertarUsuario($email,$nombre,$password,$saldo,$rol) {
	//Para poder usar la variable conexión (variable global):
	global $conexion;
	//Insertamos un nuevo usuario
	$consulta="insert into usuarios (email,nombre,password,saldo,rol) values ('$email','$nombre','$password','$saldo','$rol')";

/*	
	Cosas a relizar:
	- Modificar base de datos
	- Inserción nueva (campos:verificacion:0/1 codigo(varchar(200))) y envío de correo
	- Modificar login si la cuenta está validada
	- Enviar a pagina de enlace 'comprobar.php'
		enviamos el codigo unico por get y updatearemos
		el campo verificacion al pulsar un boton y
		redirigir al login
		
	$codigo=uniqid();
	$consulta="insert into usuarios (email,nombre,password,saldo,rol,verificacion,codigo) values ('$email','$nombre','$password','$saldo','$rol',0,'$codigo')";
*/
	//Ejecutamos la consulta
	mysqli_query($conexion,$consulta);

	//Obtener el número de filas afectadas:
	$resultado = mysqli_affected_rows($conexion);
	//echo "Filas afectadas: $resultado";

	//Cerrar la conexión con la bbdd
	mysqli_close($conexion);

	//Envío correo
/*
    $from = "apuestas@apuestas.jc.bymhost.com";
    $to = "jc.perdiguerocarlos@gmail.com";
    $subject = "Registro de cuenta";
    $message = "Hola $nombre, le informamos que hemos procedido a registrar su usuario en nuestra aplicación de Apuestas. 

		Un saludo y gracias.
    ";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);	
*/

	$to = "$email";
	$subject = "Registro de cuenta";

	// compose headers
	//$headers = "From: apuestas@apuestas.jc.bymhost.com\r\n";
	//$headers .= "Reply-To: apuestas@apuestas.jc.bymhost.com\r\n";
	//$headers .= "X-Mailer: PHP/".phpversion();

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: apuestas@apuestas.jc.bymhost.com\r\n";

	// compose message
	$message = "<p>Hola $nombre, le informamos que hemos procedido a registrar su usuario en nuestra aplicación de Apuestas. 
		</p>
		<p>
		<a href='http://apuestas.jc.bymhost.com/login.php'>Pinche el enlace http://apuestas.jc.bymhost.com/login.php</a>
		</p>

		Un saludo y gracias.
    ";
	$message = wordwrap($message, 70);

	// send email
	mail($to, $subject, $message, $headers);


	return $resultado;
}

function modificarUsuario($email,$nombre,$password,$saldo) {
	//Para poder usar la variable conexión (variable global):
	global $conexion;
	//Insertamos un nuevo usuario
	$consulta="update usuarios set nombre ='$nombre', password='$password', saldo='$saldo' where email='$email'";

	//Ejecutamos la consulta
	mysqli_query($conexion,$consulta);

	//Obtener el número de filas afectadas:
	$resultado = mysqli_affected_rows($conexion);
	//echo "Filas afectadas: $resultado";

	//Cerrar la conexión con la bbdd
	mysqli_close($conexion);
	return $resultado;
}
function eliminarUsuario($email) {
	//Para poder usar la variable conexión (variable global):
	global $conexion;
	$query = "delete from usuarios where email='$email'";
	//Ejecutamos el borrado
	mysqli_query($conexion,$consulta);

	//Obtener el número de filas afectadas:
	$resultado = mysqli_affected_rows($conexion);
	//echo "Filas afectadas: $resultado";

	//Cerrar la conexión con la bbdd
	mysqli_close($conexion);		
}	
function insertarPartido($nombre,$fecha,$hora) {
	//Para poder usar la variable conexión (variable global):
	global $conexion;
	//Insertamos un nuevo usuario
	$consulta="insert into partidos (nombre,fecha,hora,minutoGol,estado) values ('$nombre','$fecha','$hora','0','A')";

	//Ejecutamos la consulta
	mysqli_query($conexion,$consulta);

	//Obtener el número de filas afectadas:
	$resultado = mysqli_affected_rows($conexion);
	//echo "Filas afectadas: $resultado";

	//Cerrar la conexión con la bbdd
	mysqli_close($conexion);
	return $resultado;
}

function modificarPartido($idPartido,$nombre,$fecha,$hora,$minutoGol,$estado) {
	//Para poder usar la variable conexión (variable global):
	global $conexion;
	$fila=0;
	//Insertamos un nuevo usuario
	$consulta=" update partidos 
			set nombre ='$nombre', fecha='$fecha', hora='$hora', minutoGol='$minutoGol', estado='$estado' 
				where idPartido='$idPartido'";

		//Ejecutamos la actualizacion
	mysqli_query($conexion,$consulta);
	$resultado = mysqli_affected_rows($conexion);

	$consulta="update usuarios u
				inner join 	apuestas a 

						on 	u.email = a.email 
						and a.liquidada = 0

				inner join 	partidos p 

						on 	a.idPartido = p.idPartido 
						and p.idPartido = '$idPartido'
						and	p.estado = 'F'

				set		u.saldo = 
						case	
							when (a.minutoGol < p.minutoGol) 
							then u.saldo + (0.10 * a.Importe * a.minutoGol) - a.importe	
							else u.saldo - a.importe
        				end";     				
		//Ejecutamos la actualizacion
	mysqli_query($conexion,$consulta);

	$consulta= "update	apuestas a
				inner join 	partidos p 
						on 	a.idPartido = p.idPartido 
						and p.idPartido = '$idPartido'
						and	p.estado = 'F'
				set a.liquidada = 1";	

	//Ejecutamos la actualizacion
	mysqli_query($conexion,$consulta);

	//Obtener el número de filas afectadas:
	
	//echo "Filas afectadas: $resultado";

	//Cerrar la conexión con la bbdd
	mysqli_close($conexion);
	return $resultado;
}
function eliminarPartido($idpartido) {
	//Para poder usar la variable conexión (variable global):
	global $conexion;
	$query = "delete from partidos where idPartido='$idpartido'";
	//Ejecutamos el borrado
	mysqli_query($conexion,$consulta);

	//Obtener el número de filas afectadas:
	$resultado = mysqli_affected_rows($conexion);
	//echo "Filas afectadas: $resultado";

	//Cerrar la conexión con la bbdd
	mysqli_close($conexion);		
}
function insertarApuesta($email,$idpartido,$importe,$minuto) 
{
	//Para poder usar la variable conexión (variable global):
	global $conexion;
	//Insertamos un nuevo usuario
	$consulta="insert into apuestas(email,idPartido,importe,minutoGol) 
	values ('$email','$idpartido','$importe','$minuto')";

	//Ejecutamos la consulta
	mysqli_query($conexion,$consulta);

	//Obtener el número de filas afectadas:
	$resultado = mysqli_affected_rows($conexion);
	//echo "Filas afectadas: $resultado";

	//Cerrar la conexión con la bbdd
	mysqli_close($conexion);
	return $resultado;
}
/*

INSERT INTO apuestas('email','idPartido','importe','minutoGol') 
VALUES ('$email','$idpartido','$importe','$minuto')
*/

?>