<?php
	//Incluir código reutilizable en varias páginas
	include("cabecera.php");	
?>
<style>
.sombra
</style>
<div style="width:430px;border:solid 1px black;height:400px;position:absolute;top:100px;left:260px;background-color:lightgray" >	
	<h1 style="text-align: center;margin:10px">Apuesta</h1>
	<form id="frmAltaApuesta" name="frmAltaApuesta" method="post" action="insertarApuestaPartido.php">
		<hr>
		<table cellpadding="10px" style="margin:20px;width:420px" align="center">
			<tr>
				<td widh="30%"><strong>Nombre:</strong></td>
				<td><label id="lblNombre" name="lblNombre"></label></td>
			</tr>
			<tr>
				<td><strong>Fecha:</strong></td>
				<td><label id="lblFecha" name="lblFecha"></label></td>
			</tr>
			<tr>
				<td><strong>Hora:</strong></td>
				<td><label id="lblHora" name="lblHora"></label></td>
			</tr>
			<tr>
				<td><strong>Minuto Gol:</strong></td>
				<td><input type="number" id="txtMinutoGol" name="txtMinutoGol" style="width:60px"value="0" placeHolder="Indica el minuto en que se produce el gol" autocomplete="off"/></td>
			</tr>			
			<tr>
				<td><strong>Importe:</strong></td>
				<td><input type="number" id="txtImporte" name="txtImporte" style="width:60px" value="0" placeHolder="Indica el importe de la apuesta" autocomplete="off"/></td>
			</tr>
			<tr>
				<td colspan=2 align="center">		
					<input type="button" id="btnGrabar" style="margin-top:20px;height:30px; width:110px;;background:url(iconos/save.png) no-repeat;background-position: 10px 4px;" value="Grabar"/><a href="apuestas.php"><input type="button" style="margin-left:20px;margin-top:20px;height:30px; width:110px; background:url(iconos/cancel.png) no-repeat; background-position: 6px 4px;" value="Cancelar"/></a> 
				</td>
			</tr>
		</table>
		<?php
			$mensaje = "";
			if (isset($_GET["mensaje"])){
				$mensaje = $_GET["mensaje"];
			}			
		?>	
		<div id="divMensaje" width="300px" height="90px" style="margin-left:100px">
			<h3>
				<?php echo $mensaje;?>	
			</h3>
		</div>
		<input type="hidden" id="email" style="width:0px" name="email" value=""/> 		
		<input type="hidden" id="idpartido" style="width:0px" name="idpartido" value=""/> 		
	</form>
</div>
<script type="text/javascript">	

	var email = '<?php echo $_GET["email"];?>';
	$("#email").val(email);
	
	var idpartido = '<?php echo $_GET["idpartido"];?>';
	$("#idpartido").val(idpartido);	

	var nombre = '<?php echo $_GET["nombre"];?>';	
	var fecha = '<?php echo $_GET["fecha"];?>';
	var hora = '<?php echo $_GET["hora"];?>';
	var disponible = <?php $disponible = str_replace('.', '', $_GET["disponible"]); echo $disponible;?>;

	$(document).ready(function(){
		$("#lblNombre").text(nombre);
		$("#lblFecha").text(fecha);
		$("#lblHora").text(hora);

	  	$('body').on('click', '#btnGrabar', function(){
	  		validarDatos();
	  	});	  
	})
	
	function validarDatos(){
		if ($("#txtMinutoGol").val()!="" &&
			($("#txtMinutoGol").val()<1||$("#txtMinutoGol").val()>90))
		{
			alert("El minuto de un gol es entre [1,90]");
			return false;	
		} 
		if ($("#txtImporte").val()<="0")
		{
			alert("Debes indicar un importe superior a cero");
			return false;	
		}	
		if ($("#txtImporte").val()>disponible)
		{
			alert("Tu importe apostado no puede superar tu saldo disponible");
			return false;	
		}					 
		frmAltaApuesta.submit();
	}	
</script>
<?php
include("pie.php");
?>


