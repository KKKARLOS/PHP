<?php
	// Conectando, seleccionando la base de datos
	require("cabecera.php");
?>
<br/><h1>Estadísticas</h1>	
<div style="width:100%" align="center">
	<table id="tblCabecera" width="320px" style="margin-top:20px;">
		<tr>
		<th width="320px" style='text-align:center'>Anuncios</th>
		</tr>
	</table>
	<div id="divDatos" style="width:338px;height:180px;overflow-y:auto;">
		<table id="tblDatos" width="320px">
			<tbody>			
			</tbody>		
		</table>
	</div>
	<input style="width:100px;height: 30px; margin:20px;background:url(../../iconos/regresar.png) no-repeat; background-position: 6px 4px;text-align: right; background-color: #d7e9f6" class="ui-button ui-corner-all ui-widget" type="button" name="btnSalir" id="btnSalir" value="Salir" />
</div>
<!--
-->
<script>
	var email = "<?php echo $_GET["email"];?>";
	$(function(){
		$("#btnSalir").on("click",function(){
			location.href="../intranet/intranet_view.php?email="+email;
		});
		pintarEstadisticas();		
	});

	function pintarEstadisticas(){
		parameters={
			funcion: "estadisticas"
		};
		$.ajax({
			type: 'POST',
			url: "../../servicios/sw_anuncio.php",
			data: parameters,
			success: function(data){
				anuncios = JSON.parse(data);
				$("#tblDatos tbody").html("");
				
				pintarFila("0","Total: "+anuncios[0].TOTAL_ANUNCIOS,anuncios);
				pintarFila("V","Total precio chollo: "+anuncios[0].TOTAL_PRECIO_CHOLLO,anuncios);
				pintarFila("A","Total precio correcto: "+anuncios[0].TOTAL_PRECIO_CORRECTO,anuncios);
				pintarFila("R","Total precio alto: "+anuncios[0].TOTAL_PRECIO_ALTO,anuncios);

				// enlazo evento click a las filas
				$("#tblDatos tbody>tr").on("click",function(){
						location.href="anuncios_view.php?idcategoria="+$(this).attr("data-color");
				});				
			},			
			error: function(xhr, status, error) {
				responseText = JSON.parse(xhr.responseText);
				$("#divError").text(responseText.error);
	    		$("#ErrorDialog" ).dialog("open");
			}
		});
		function pintarFila(opcion,strCon,oAnuncios){
			if (opcion=="0")
			{
			strCon += " <progress value="+(parseInt(oAnuncios[0].TOTAL_ANUNCIOS)+10) +" min=0 max="+oAnuncios[0].TOTAL_ANUNCIOS+"></progress>";		
			}
			else if (opcion=="V"){
			strCon += " <progress value="+oAnuncios[0].TOTAL_PRECIO_CHOLLO +" min=0 max="+oAnuncios[0].TOTAL_ANUNCIOS+"></progress>";
			}else if (opcion=="A"){
			strCon += " <progress value="+oAnuncios[0].TOTAL_PRECIO_CORRECTO +" min=0 max="+oAnuncios[0].TOTAL_ANUNCIOS+"></proress>";	
			}else if (opcion=="R"){
			strCon += " <progress value="+oAnuncios[0].TOTAL_PRECIO_ALTO +" min=0 max="+oAnuncios[0].TOTAL_ANUNCIOS+"></progress> ";	
			}				
			
			var fila="";
			fila+="<tr data-color='"+opcion+"'  style='cursor:pointer'>";
			fila+="	<td valign='center' style='text-align:left'>"+strCon+"</td>";
			fila+="</tr>"; 
			$("#tblDatos tbody").append(fila);	
		};		
	}
</script>
</body>
</html>
