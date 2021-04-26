<?php
	// Conectando, seleccionando la base de datos
	
	require("cabecera.php");
	require("conexionbd.php");
	// Realizar una consulta MySQL

	$query = "SELECT idPartido, nombre, DATE_FORMAT(fecha,'%d/%m/%Y') as fecha, hora, minutoGol, case when estado = 'F' then 'Finalizado' when estado = 'C' then 'Cancelado' when estado = 'A' then 'Activo' end as estado FROM partidos";
	//ejecutamos la consulta
?>
	<style>
		table {border:1px solid black;border-collapse: collapse;margin-left: 15px;background-color: gray}
		th,td{border:1px solid black;}	
		td {text-align: center}	
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
<div style="width:710px;border:solid 1px black;height: 520px;position:absolute;top:100px;left:150px;background-color:lightgray" >
	<h2 style="text-align:center">Lista de Partidos</h2>
	<hr>
	<div style="text-align: center; margin-top:20px;"> 
		<input onclick="location.href='altaPartido.php'" style="width:110px;height: 30px;background:url(iconos/anadir.png) no-repeat; background-position: 6px 4px;text-align: right" type="button" name="btnAlta" id="btnAlta" value="Alta Partido" />
	</div>

<?php
	if ($result = mysqli_query($conexion, $query))
	{
		echo '<div id="divPartidos" style="z-index:100;height:320px;overflow-y:auto;margin-top:10px">';
		echo '<table id="tblCabecera" width="680px">';
		echo '<tr>';
		echo '	<th width="95px">Fecha</th>';
		echo '	<th width="92px">Hora</th>';
		echo '	<th width="270px">Partido</th>';
		echo '	<th width="91px">Minuto Gol</th>';
		echo '	<th width="89px">Estado</th>';
		echo '	<th width="89px">Acciones</th>';
		echo '</tr>';
		echo '</table>';
		echo '<table id="tblDatos" width="680px">';

		while ($row = mysqli_fetch_array($result)){ 
			$idpartido=$row["idPartido"];
			$nombre=$row["nombre"];
			$fecha=$row["fecha"];
			$hora=$row["hora"];
			$minutogol=$row["minutoGol"];
			$estado=$row["estado"];
			echo '<tr>';
			echo "	<td width='90px'>$fecha</td>";
			echo "	<td width='90px'>$hora</td>";
			echo "	<td width='279px'>$nombre</td>";
			echo "	<td width='103px'>$minutogol</td>";
			echo "	<td width='88px'>$estado</td>";
?>			
			<td width="101px">
			<img style="cursor:pointer" onclick="confirmarEliminar('<?php echo $idpartido;?>','<?php echo $nombre;?>')" src="iconos/delete.png" width="15"/>
			<a href="datosPartido.php?idpartido=<?php echo $idpartido;?>"><img src="iconos/edit.png" width="15"/></a>
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
	<div style="text-align: center; margin-top:20px;"> 
		<input onclick="location.href='intranet.php'" style="width:110px;height: 30px;background:url(iconos/regresar.png) no-repeat; background-position: 6px 4px;text-align: right;text-align:center" type="button" name="btnSalir" id="btnSalir" value="Salir" />
	</div>
</div>

<script>
	function confirmarEliminar(idPartido,nombre)
	{
		valor=confirm("Seguro que deseas eliminar el partido "+nombre+"?");
		if (valor) location.href="eliminarPartido.php?idPartido="+idPartido;
	}
</script>
<?php
include("pie.php");
?>