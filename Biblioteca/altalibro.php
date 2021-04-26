<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table{border:1px solid black;border-collapse: collapse;margin-top:200px;}
		td{border:1px solid black;}
		.sombra{background-color:gray;}
	</style>
	<script>	
		function validarAlta()
		{
			if (document.getElementById("txtIsbn").value=="")
			{
				alert("Debes indicar un ISBN");
				return;
			}
			if (document.getElementById("txtTitulo").value=="")
			{
				alert("Debes indicar un título");
				return;
			}
			if (document.getElementById("cboAutor").value=="-1")
			{
				alert("Debes indicar el autor");
				return;
			}
			//document.getElementById("formulario").action = "\insertarLibro.php";
			document.getElementById("formulario").submit();				
		}
	</script>
</head>
<body>
	<form name="formulario" id="formulario" method="post" action="insertarlibro.php">
		<table width="500px" align="center" cellpadding="10px">
			<tr>
				<td colspan="2" class="sombra" align="center"><h1>Nuevo Libro</h1></td>
			</tr>
			<tr>
				<td>ISBN:</td>
				<td><input type="text" id="txtIsbn" name="txtIsbn" placeholder="Introduzca el ISBN" style="width:400px"></td>
			</tr>
			<tr>
				<td>Titulo</td>
				<td><input type="text" id="txtTitulo" name="txtTitulo" placeholder="Introduzca el título del libro" style="width:400px"></td>
			</tr>
			<tr>
				<td>Autor</td>
				<td><select name="cboAutor" id="cboAutor" style="width:400px">
					<option value="-1">[Seleccione un autor]</option>
				<?php
					require("conexionbd.php");

					// Realizar una consulta MySQL

					$query = "select cod_autor, nombre from autores";

					//ejecutamos la consulta

					if ($result = mysqli_query($conn, $query))
					{
						while ($row = mysqli_fetch_array($result)){ 
								$cod_autor=$row["cod_autor"];
								$nombre=$row["nombre"];		
		    					echo "<option value='".$cod_autor."'>".$nombre."</option>";
						}
						// Liberar resultados
						mysqli_free_result($result);
					}
					// Cerrar la conexión
					mysqli_close($conn);
				?>
		</select></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input class="sombra" onclick="validarAlta()" style="width:110px;height: 30px" type="button" name="btnAlta" id="btnAlta" value="Alta" />
                </td>
			</tr>
		</table>
	</form>
</body>
</html>