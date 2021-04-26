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
	<title>Lista de tareas</title>
	<script src="jquery.min.js"></script>
	<style>
		td:not(.oculto) {border:1px solid black;}
		table {border-collapse: collapse;}

		ul{ list-style-type:none; margin:0; padding:0; margin-bottom:20px;border: 1px solid black}
		li { text-align:left;padding:5px 0; border-bottom:solid 1px #ccc}
		li:hover  {
    		background-color: lightgray; //mostrar el fondo gris del li activo
			}
	</style>
</head>
<body style="width: 700px; margin: 20px auto; border: 1px solid black; padding: 10px;">
	<span style="text-align: center"><h3>Registrar usuario:</h3></span>
	<span style="text-align: center">
	<form id="form_tarea">

		<table cellpadding="10px" width=120>
			<tr>
				<td><strong>Email:</strong></td>
				<td><input type="text" id="txtEmail" value="" placeHolder="Indica el email" size="60"/></td>
			</tr>
			<tr>
				<td><strong>Nombre:</strong></td>
				<td><input type="text" id="txtNombre" value="" placeHolder="Indica el nombre" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td class="oculto"><strong></strong></td>
				<td class="oculto"><select id="cboNombres"></select></td>
			</tr>			
		</table>
		<br/><br/><br/>
		<input type="button" value="Registrar" onclick="RegistrarUsuario()" />
		<div id="divUsuarios" style="z-index:100;background:white;overflow-y:auto">
			<ul id="listaUsuarios">
			</ul>
		</div>
	</form>
<script type="text/javascript">


$(document).ready(function(){
  $('body').on('blur', '#txtEmail', function(){
  	comprobarEmail();
  });
  $('body').on('keyup', '#txtNombre', function(){
  	mostrarNombres();
  });
  $("#cboNombres").hide();
  $("#divUsuarios").hide();
/*  
  $('body').on('click', '#cboNombres', function(){
  	$("#txtNombre").val($("#cboNombres option:selected").text());
  	$("#cboNombres").hide();
  });
*/  
  $('body').on('click', 'li', function(){
  	$("#txtNombre").val($(this).html());
  	$("#divUsuarios").hide();
  });
})	
function comprobarEmail(){
	$.ajax({
		type: 'POST',
		url: "sw_usuario_email.php",
		data: { email: $("#txtEmail").val() },
		success: function(data){
			console.log(data);
			if (data=="true") {
				$("#txtEmail").css("backgroud-color","red");
				alert("Existe otro usuario con el mismo Email");
			}
		},
		error: function (xhr, status, error) {
			console.log("error:"+err.Message);
		}
	});
}
function mostrarNombres(){
	$.ajax({
		type: 'POST',
		url: "sw_usuario_nombre.php",
		data: { nombre: $("#txtNombre").val() },
		success: function(data){
			//console.log(data);
			usuarios = JSON.parse(data);
			//console.log(usuarios);

/*

// Con combo
			$("#cboNombres").html("");
			$.each(usuarios, function( key, value ) {
				$("#cboNombres").append("<option value='"+value.cod_autor+"'>"+value.nombre+"</option>");						  
			});	
			$("#cboNombres").width($("#txtNombre").width()+2);
			$("#cboNombres").height($("#txtNombre").height());
			var coordenadas = $("#txtNombre").position();
			coordenadas.left=coordenadas.left+100;

			$('#cboNombres').css({position: 'absolute', top: '165px', left: '152px'});

			$("#cboNombres").show();
			//$("#cboNombres").height($('#cboNombres option').length*20);
*/			
			//$("#divUsuarios").html("");
			$("#divUsuarios").width($("#txtNombre").width()+4);
			$("#divUsuarios").height($("#txtNombre").height());
			$('#divUsuarios').css({position: 'absolute', top: '165px', left: '152px'});
			$('#divUsuarios li').remove();
			//recorremos el data
			var coincidencias=0;
			$.each(usuarios, function( key, value ) {
				console.log(key);
				item = "<li>"+value.nombre+"</li>";
				console.log(item);
				coincidencias++;
				$("#listaUsuarios").append(item);
			});
			if (coincidencias<3)
				$("#divUsuarios").height(coincidencias*30);
			else
				$("#divUsuarios").height(60);

			$('#divUsuarios').show();
		},
		error: function (xhr, status, error) {
			console.log("error:"+err.Message);
		}
	});
}
</script>
</body>
</html>


