<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="width: 950px; margin: 0 auto; border-style: double; margin-top	:20px; padding: 30px; text-align: center;">
<?php 
	//Usaremos variables de sesión:
	session_start();

	// Conectando, seleccionando la base de datos
	require("conexionbd.php");
	//unset($_SESSION["idPartida"]);
	//unset($_SESSION["turno"]);
	//unset($_SESSION["total"]);
	if (!isset($_SESSION["idPartida"])) {

		//inicio de juego

		// obtener posición de la calavera
		$pos_calavera = rand(1,9);

		// generar los numeros aleatorios únicos correspondientes a cada casilla

		$arrayNumeros = range(1, 9); 
		shuffle($arrayNumeros); 

		//insertar la calavera al principio del array
		
		array_unshift($arrayNumeros, $pos_calavera);

		//Grabar la partida y obtener el número de partida correspondiente

		$_SESSION["turno"]=1;

		$query = "insert into partidas (idPartida, turno, puntos) select ifnull(max(idPartida+1),1), ".$_SESSION["turno"].",0 from partidas";

//echo "query insert:$query";
		mysqli_query($conn, $query);

		$query = "select ifnull(max(idPartida),1) as idPartida from partidas";
//echo "query select:$query";
		$result = mysqli_query($conn, $query);

		$data=mysqli_fetch_assoc($result);
		$_SESSION["idPartida"]=$data['idPartida'];
//echo "idPartida:data['idPartida']";
		//creamos en la tabla puntuaciones lo correspondiente a esa partida

		for($x = 0; $x <= 9; $x++)
		{
			$query = "insert into posiciones (idPartida,idCasilla,valor,pinchado) values ('".$_SESSION["idPartida"]."','$x','$arrayNumeros[$x]','0')";
			mysqli_query($conn, $query);
		}

		// Free result set
		mysqli_free_result($result);

		// Cerrar la conexión
		//mysqli_close($conn);
	}
	else
	{
		//echo "hola";
		$query = "insert into partidas (idPartida, turno, puntos) values (".$_SESSION["idPartida"].",".$_SESSION["turno"].", 0)";
		//echo "query:$query";
		mysqli_query($conn, $query);		
	}

/*	$query = "select idPartida,idCasilla,valor,pinchado from posiciones where IdPartida = ".$_SESSION["idPartida"];

	$result = mysqli_query($conn, $query);

	//ejecutamos la consulta

	$cont = 0;
	echo "<table>";
	while ($row = mysqli_fetch_array($result)){ 
		$idPartida = $row["idPartida"];
		$idCasilla= $row["idCasilla"];
		$valor=$row["valor"];
		$pinchado=$row["pinchado"];
	    echo "<td>".$idPartida."</td>";
	    echo "<td>".$idCasilla."</td>";
	    echo "<td>".$valor."</td>";
	    echo "<td>".$pinchado."</td>";
	    echo "</tr>";
	} 
	echo "</table>";
	echo "<br/>";
	// Free result set
	mysqli_free_result($result);
*/
	// pintar las casillas (cogiendo los valores desde base de datos)

	$query = "select idPartida,idCasilla,valor,pinchado from posiciones where IdPartida = ".$_SESSION["idPartida"];

	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)){ 
		$idPartida = $row["idPartida"];
		$idCasilla= $row["idCasilla"];
		$valor=$row["valor"];
		$pinchado=$row["pinchado"];
		if ($idCasilla==0) continue;
		$imagen = "ic_int.png";	
		$enlace = "jugar.php?pos=$idCasilla";
		//$enlace = "jugar.php?pos=$idCasilla&val=$valor";
		if ($pinchado==1) 
		{
			$imagen = "$idCasilla.jpg";
			$enlace = "#";
		}			
		//echo "imagen:$imagen";
		//echo "enlace:$enlace";
	    echo "<a href='$enlace'><img src='$imagen' height='100' width='100'></a>";
	} 
	// Free result set
	mysqli_free_result($result);
	// Cerrar la conexión
	mysqli_close($conn);	 
?>	
</body>
</html>