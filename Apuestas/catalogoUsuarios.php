<?php
	// Conectando, seleccionando la base de datos
	
	require("cabecera.php");
	require("conexionbd.php");
	// Realizar una consulta MySQL
	$query = "select email, nombre from usuarios";
?>

<style>
	table {border:1px solid black;border-collapse: collapse;margin-left: 15px;background-color: gray}
	th,td{border:1px solid black;text-align:left;padding-left:4px  }	
		
	h1 {text-align: center}
	#tblDatos tr:nth-child(odd){background-color:#cccccc;}
	#tblDatos tr:nth-child(even){background-color:#fbfbfb;}
	#tblDatos tr:hover {
		background-color: gray; //mostrar el fondo gris del li activo
	}

	a:link
	{
		text-decoration: none;
	}
</style>

<div style="width:710px;border:solid 1px black;height: 520px;position:absolute;top:100px;left:200px;background-color:lightgray" >
	<h2 style="text-align:center">Lista de Usuarios</h2>
	<hr>
	<div style="text-align: center; margin-top:20px;"> 
		<input onclick="location.href='registrar.php?origen=catalogoUsuarios.php'" style="width:110px;height: 30px;background:url(iconos/user.png) no-repeat; background-position: 6px 4px;text-align: right" type="button" name="btnAlta" id="btnAlta" value="Alta Usuario" />
	</span>
<?php
	if ($result = mysqli_query($conexion, $query))
	{
		echo '<div id="divUsuarios" style="z-index:100;height:320px;overflow-y:auto;margin-top:10px">';
		echo '<table id="tblCabecera" width="680px">';
		echo '<tr>';
		echo '	<th width="310px">Nombre</th>';
		echo '	<th width="298px">Email</th>';
		echo '	<th width="72px">Acciones</th>';
		echo '</tr>';
		echo '</table>';
		echo '<table id="tblDatos" width="680px">';		

		while ($row = mysqli_fetch_array($result)){ 
			$nombre=$row["nombre"];			
			$email=$row["email"];

			echo '<tr>';
			echo "	<td width='300px'>$nombre</td>";
			echo "	<td width='290px'>$email</td>";
			echo "	<td style='text-align:center'>";
?>
			<img style="cursor:pointer" onclick="confirmarEliminar('<?php echo $email;?>','<?php echo $nombre;?>')" src="iconos/delete.png" width="15"/>
			<a href="misDatos.php?origen=catalogoUsuarios.php&email=<?php echo $email;?>"><img src="iconos/edit.png" width="15"/></a>
			</td>
			</tr>
<?php 
		}
		echo "</table>";
		echo "</div>";
	}
	
	// Free result set
	mysqli_free_result($result);

	// Cerrar la conexión
	mysqli_close($conexion);
?>
</div>
	<div style="text-align: center; margin-top:20px;"> 
		<input onclick="location.href='intranet.php'" style="width:110px;height: 30px;background:url(iconos/regresar.png) no-repeat; background-position: 6px 4px;text-align:center" type="button" name="btnSalir" id="btnSalir" value="Salir" />
	</span>
<script>
	function confirmarEliminar(email,nombre)
	{
		valor=confirm("Seguro que deseas eliminar el usuario "+nombre+"?");
		if (valor) location.href="eliminarUsuario.php?email="+email;
	}
</script>
<?php
include("pie.php");
?>