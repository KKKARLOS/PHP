<?php
	//Incluir código reutilizable en varias páginas
	include("cabecera.php");	
?>

<div style="width:630px;border:solid 1px black;height:440px;position:absolute;top:100px;left:260px;background-color:lightgray" >	
	<span style="text-align: center;margin-top:40px"><h1>Partido</h1></span>

	<form id="frmDatosPartido" name="frmDatosPartido" method="post" action="modificarPartido.php">
		<hr>
		<table cellpadding="10px" style="margin-top:40px" align="center">
			<tr>
				<td width="120px"><strong>Nombre:</strong></td>
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
				<td><strong>Minuto Gol:</strong></td>
				<td><input type="number" id="txtMinutoGol" name="txtMinutoGol" style="width:120px" value="" placeHolder="Indica el minuto en que se produce el gol" autocomplete="off"/></td>
			</tr>
			<tr>
				<td><strong>Estado:</strong></td>
				<td><select name="cboEstado" id="cboEstado" style="width:160px">
					<option value="-1">[Seleccione un estado]</option>
					<option value="A">Activo</option>
					<option value="F">Finalizado</option>
					<option value="C">Cancelado</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan=2 align="center">		
					<input type="button" id="btnGrabar" style="cursor:pointer;margin-top:20px;height:30px; width:110px;background:url(iconos/save.png) no-repeat;background-position: 10px 4px;" value="Grabar"/>
				<a href="intranet.php" style="cursor:default;text-decoration: none;"><input type="button" style="cursor:pointer;margin-left:20px;margin-top:20px;height:30px;width:110px; width:110px; background:url(iconos/cancel.png) no-repeat; background-position: 6px 4px;" value="Cancelar"/></a> 
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
			<br>
			<h1>
				<?php echo $mensaje;?>	
			</h1>
		</div>
		<input type="hidden" id="idPartido" style="width:0px" name="idPartido" value=""/> 		
	</form>
</div>
<script type="text/javascript">
	var idpartido = '<?php echo $_GET["idpartido"];?>';
	$("#idPartido").val(idpartido);		
	$(document).ready(function(){
		pintarDatosPartido(idpartido);
		
	  	$('body').on('click', '#btnGrabar', function(){
	  		validarDatos();
	  	});	  
	})
	function pintarDatosPartido(idpartido){
		$.ajax({
			type: 'POST',
			url: "sw_leerPartido.php",
			data: { idpartido: idpartido },
			success: function(data){
				console.log(data);
				//convertimos en array de objetos el jason
				partido = JSON.parse(data);

				$.each(partido, function( key, value ) {
					$("#txtNombre").val(value.nombre);
					$("#txtFecha").val(value.fecha);
					//$("#txtHora").val(value.hora);
					$("#txtHora").attr({'value':value.hora});
					$("#txtMinutoGol").val(value.minutoGol);
					$("#cboEstado").val(value.estado);	  
				});				
			},
			error: function (xhr, status, error) {
				console.log("error:"+err.Message);
			}
		});
	}		
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
		if ($("#txtMinutoGol").val()!="" && $("#cboEstado").val()=="F" &&
			($("#txtMinutoGol").val()<1||$("#txtMinutoGol").val()>90))
		{
			alert("El minuto de un gol es entre [1,90]");
			return false;	
		} 
		/*
		if ($("#txtMinutoGol").val()!="" && $("#cboEstado").val()!="P" && $("#cboEstado").val()!="C" )
		{
			alert("Si se indica el minuto del gol del partido el estado debe estar 'Finalizado' o 'Cancelado'");
			return false;	
		}	
		*/			
		frmDatosPartido.submit();
	}	
</script>
<?php
include("pie.php");
?>


