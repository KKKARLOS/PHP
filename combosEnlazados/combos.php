<?php
include("conexion_bd.php");
$consulta ="Select * from tareas";
$datos = mysqli_query($conexion,$consulta);
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Familias plato:</title>
	<script src="jquery.min.js"></script>
</head>
<body style="width: 700px; margin: 20px auto; border: 1px solid black; padding: 10px;">
	<span style="text-align: center"><h3>Menu:</h3></span>
	<span style="text-align: center">
	<form id="form_tarea">
		<br/>
<p>
  <strong>Platos</strong>
  <select id="PlatosFamilia">
  	<option value="0">Elije un plato</option>
  </select>
</p>
	<p>
  <strong>Plato Elegido por familia</strong>
  <select id="Platos">
  	<option value="0"></option>
  </select>
</p>
	</form>
<script type="text/javascript">


$(document).ready(function(){
  pintarPlatosFamilia();

  $('body').on('change', '#PlatosFamilia', function(){
  	pintarPlatos($(this).val());
  });
})	

function pintarPlatosFamilia(){
	$.ajax({
		type: 'POST',
		url: "sw_platos_familia.php",
		data: {},
		success: function(data){
			console.log(data);
			platos = JSON.parse(data);
			//recorremos el data
			$.each(platos, function( key, value ) {
				$("#PlatosFamilia").append("<option value='"+value.idFamilia+"'>"+value.nombre+"</option>");			  
			});			
		},
		error: function (xhr, status, error) {
			console.log("error:"+err.Message);
		}
	});
}
function pintarPlatos(idFamilia){
	$.ajax({
		type: 'POST',
		url: "sw_platos.php",
		data: { idFamilia: idFamilia },
		success: function(data){
			console.log(data);
			//convertimos en array de objetos el jason
			usuarios = JSON.parse(data);
			//recorremos el data
			$("#Platos").html("");
			$.each(usuarios, function( key, value ) {
				$("#Platos").append("<option value='"+value.id+"'>"+value.nombre+"</option>");						  
			});				
		},
		error: function (xhr, status, error) {
			console.log("error:"+err.Message);
		}
	});
}
</script>
</body>
</html>


