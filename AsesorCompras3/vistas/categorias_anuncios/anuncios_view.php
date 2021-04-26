<?php
	// Conectando, seleccionando la base de datos
	require("cabecera.php");
?>
<br/><h1>Anuncios</h1>	
<div style="width:100%" align="center">
	<table id="tblCabecera" width="620px">
	<table id="tblCabecera" width="620px" style="margin-top:20px;">
		<tr>
		<th width="400px">Producto</th>
		<th width="100px" style='text-align:center'>Fecha</th>
		<th width="120px" style='text-align:center'>Precio</th>
		</tr>
	</table>
	<div id="divDatos" style="width:652px;height:380px;overflow-y:auto;">
		<table id="tblDatos" width="620px">
			<tbody>			
			</tbody>		
		</table>
	</div>
</div>
<!--
-->
<script>
	var idcategoria = "<?php echo $_GET["idcategoria"];?>";

	$(function(){
		$("#tblDatos tbody>tr").on("click",function(){
			location.href=$(this).attr("data-url");
		});
		pintarAnuncios();
	});

	function pintarAnuncios(){
		if (idcategoria==0)
			parameters={
					funcion: "catalogoTotal"
			};			
		else
			parameters={
					funcion: "catalogoCategoria",
					idcategoria: idcategoria
			};
		$.ajax({
			type: 'POST',
			url: "../../servicios/sw_anuncio.php",
			data: parameters,
			success: function(data){
				anuncios = JSON.parse(data);
				$("#tblDatos tbody").html("");
			
				$.each(anuncios, function( key, value ) {
					var fila="";
					fila+="<tr id='"+value.idanuncio+"' data-url='"+value.urlportalventa+"'>";
					var foto=(value.foto=="")? "noproduct.png" : value.foto;
					fila+="	<td width='100px' style='text-align:center'><img src='"+foto+"' width='60px' height='60px'</td>";		
					fila+="	<td width='280px' valign='center'>"+value.nombre+"</td>";	

					fila+="	<td width='100px' valign='center'>"+moment(value.fecha_alta_mod).format('DD/MM/YYYY');+"</td>";

					fila+="	<td width='90px' valign='center'>"+value.precio_venta+"</td>";

					color = "verde.gif";
					fila+="	<td width='30px' style='text-align:center'><img style='cursor:pointer' src='../../iconos/"+color+"' width='20px' title='Color'/>					</td>";
					fila+="</tr>"; 
					$("#tblDatos").append(fila);
				});	
			},			
			error: function(xhr, status, error) {
				responseText = JSON.parse(xhr.responseText);
				$("#divError").text(responseText.error);
	    		$("#ErrorDialog" ).dialog("open");
			}
		});
	}
</script>
</body>
</html>
