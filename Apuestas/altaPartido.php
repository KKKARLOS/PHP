<?php
	//Incluir código reutilizable en varias páginas
	include("cabecera.php");	
?>

<div style="width:630px;border:solid 1px black;height:400px;position:absolute;top:100px;left:260px;background-color:lightgray" >	
	<span style="text-align: center;margin-top:40px"><h1>Partido</h1></span>

	<form id="frmAltaPartido" name="frmAltaPartido" method="post" action="insertarPartido.php">
		<hr>
		<table cellpadding="10px" style="margin:40px" align="center">
			<tr>
				<td><strong>Nombre:</strong></td>
				<td><input type="text" id="txtNombre" name="txtNombre" value="" placeHolder="Indica el nombre" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td><strong>Fecha:</strong></td>
				<td><input type="date" id="txtFecha" name="txtFecha" style="width:130px" value="" placeHolder="Indica la fecha" autocomplete="off"/></td>
			</tr>
			<tr>
				<td><strong>Hora:</strong></td>
				<td align="left"><input type="time" id="txtHora" name="txtHora" style="width:80px" value="" placeHolder="Indica la hora" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td colspan=2 align="center">		
					<input type="button" id="btnGrabar" style="cursor:pointer;margin-top:20px;height:30px; width:110px;background:url(iconos/save.png) no-repeat;background-position: 10px 4px;" value="Grabar"/>
					<input type="button" id="btnCancelar" style="margin-left:20px;margin-top:20px;height:30px; width:110px; background:url(iconos/cancel.png) no-repeat; background-position: 6px 4px;" value="Cancelar"/>
				</td>
			</tr>
		</table>
		<?php
			$mensaje = "";
			if (isset($_GET["mensaje"])){
				$mensaje = $_GET["mensaje"];
			}			
		?>	
		<div id="divMensaje" width="300px" height="90px" style="text-align:center">
			<h1>
				<?php echo $mensaje;?>	
			</h1>
		</div>
	</form>
</div>
<script type="text/javascript">	
	$(document).ready(function(){
	  	$('body').on('click', '#btnGrabar', function(){
	  		validarDatos();
	  	});	
		$('body').on('click', '#btnCancelar', function(){
	  		location.href="catalogoPartidos.php"; //$("#origen").val();
	  	});	 	  	  
	})
	
	function validarDatos(){
		if ($("#txtNombre").val()=="")
		{
			alert("Debes indicar el nombre");
			return false;	
		} 		
		if ($("#txtFecha").val()=="")
		{
			alert("Debes indicar la fecha");
			return false;	
		} 
		if ($("#txtHora").val()=="")
		{
			alert("Debes indicar la hora");
			return false;	
		} 
		frmAltaPartido.submit();
	}	
</script>
<?php
include("pie.php");
?>


