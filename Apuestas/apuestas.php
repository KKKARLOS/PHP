<?php
	// Conectando, seleccionando la base de datos
	require("cabecera.php");
?>
	<style>
		.filaSel {background-color: gray !important;}
		table {border:1px solid black;border-collapse: collapse;margin-left: 15px;background-color: gray}
		th,td{border:1px solid black;}	
		th {height: 30px;}	
		h1 {text-align: center}
		h3 {text-align: left}
		#tblDatos, #tblMisDatos  tr:nth-child(odd){background-color:#cccccc;}
		#tblDatos, #tblMisDatos tr:nth-child(even){background-color:#fbfbfb;}
		#tblMisDatos>tbody>tr>td {text-align:center;}		
	</style>
<div style="width:710px;border:solid 1px black;height:700px;position:absolute;top:10px;left:150px;background-color:lightgray" >
	<h2  style="text-align:center; margin-top:10px;">Apuestas</h2>
	<hr>
	<div style="text-align: center; margin-top:10px;"> 
		<div style="float: left;display:inline-block;">
			<span style="margin:20px;font-size:20px">Apuestas en Juego</span>
			<input id="btnNuevaApuesta"  style="width:110px;height:30px;margin:10px;;background:url(iconos/anadir.png) no-repeat; background-position: 6px 4px;text-align: right;text-align:center" type="button" name="btnNuevaApuesta" value=" Apuesta" />
			<strong><label style="margin-left:240px">Saldo:</label></strong><label style="margin-left:10px;font-size:20px" id="lblSaldo"></label>	
		</div>

		<table id="tblCabecera" width="660px">
			<tr>
				<th width="90px">Fecha</th>
				<th width="90px">Hora</th>
				<th width="260px">Partido</th>
			</tr>
		</table>
		<div id="divPartidos" style="height:280px;overflow-y:auto;width:696px;">			
			<table id="tblDatos" width="660px"		>
				<tbody>	
					<tr style="height:20px">
						<td width='90px'></td>
						<td width='90px'></td>
						<td width='260px'></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div style="float: left;display:inline-block;">
		<span style="margin:20px;font-size:20px">Mis Apuestas</span>
	</div>	
	<table id="tblMiCabecera"  style="margin-top:30px;" width="660px">
		<tr>
			<th width="90px">Fecha</th>
			<th width="70px">Hora</th>
			<th width="21px">Minuto</th>
			<th width="37px">Importe</th>
			<th width="243px">Partido/Minuto Gol</th>
		</tr>
	</table>
	<div id="divMisPartidos" style="height:160px;overflow-y:auto;width:696px;">			
		<table id="tblMisDatos" width="660px"		>
			<tbody>	
				<tr style="height:20px">
					<td width='90px'></td>
					<td width='90px'></td>
					<td width='260px'></td>
				</tr>
			</tbody>
		</table>
	</div>	
	<div style="text-align: right; margin-right:32px; margin-top:0px"> 
		<input onclick="location.href='intranet.php'" style="width:110px;height: 30px;background:url(iconos/regresar.png) no-repeat; background-position: 6px 4px;text-align: right;text-align:center" type="button" name="btnSalir" id="btnSalir" value="Salir" />
	</div>
<script type="text/javascript">
	var email = '<?php echo $_SESSION["email"];?>';
	var idPartidoSel="";
	var nombre="";

	setInterval(function()
		{
			pintarSaldo();
			pintarDatosPartidosApuestas(email);
		}, 20000);

	$(document).ready(function(){
		pintarSaldo();
		pintarDatosPartidosApuestas();
		pintarDatosMisPartidosApuestas();

	  	$('body').on('click', '#btnNuevaApuesta', function(){
	  		if (idPartidoSel=="") 
	  		{
	  			alert("Debes seleccionar un partido")
	  			return false;
	  		}

	  		location.href="nuevaApuesta.php?email="+email+"&idpartido="+idPartidoSel+"&fecha="+fecha+"&hora="+hora+"&nombre="+nombre+" 			&disponible="+$('#lblSaldo').html();	  		
	  	});	
	  	$('body').on('click', '#tblDatos tr', function(){ 
 			var selected = $(this).hasClass("filaSel"); 
 			$("#tblDatos tr").removeClass("filaSel");
 			if(!selected) $(this).addClass("filaSel"); 


	  		//$("#tblDatos tr").removeClass("filaSel");
			idPartidoSel=$(this).attr("id");
			fecha=$(this).find("td").eq(0).text();
			hora=$(this).find("td").eq(1).text();
			nombre=$(this).find("td").eq(2).text();
			//$(this).addClass("filaSel");
	  	});	
/*	  	
INSERT INTO `partidos`(`nombre`, `fecha`, `hora`, `minutoGol`, `estado`) VALUES ('Valladolid - Girona','2019-01-23','21:20','0','A')	  	  
*/	  	
	})
	function pintarSaldo(){
		$.ajax({
			type: 'POST',
			url: "sw_leerSaldoUsuario.php",
			data: { email: email },
			success: function(data){
				console.log(data);
				$("#lblSaldo").html(data);
			},			
			error: function (xhr, status, error) {
				console.log("error:"+err.Message);
			}
		});
	}	
	function pintarDatosPartidosApuestas(){
		$.ajax({
			type: 'POST',
			url: "sw_leerPartidosApuestas.php",
			data: { email: email },
			success: function(data){
				console.log(data);
				//convertimos en array de objetos el jason
				partidos = JSON.parse(data);
				$("#tblDatos tbody").html("");
				$.each(partidos, function( key, value ) {
					var fila="";
					fila+="<tr id='"+value.idPartido+"'>";
					fila+="	<td width='90px'>"+value.fecha+"</td>";
					fila+="	<td width='90px'>"+value.hora+"</td>";
					fila+="	<td width='260px'>"+value.nombre+"</td>";
					fila+="</tr>"; 
					$("#tblDatos").append(fila);
				});				
			},
			error: function (xhr, status, error) {
				console.log("error:"+err.Message);
			}
		});
	}	
	function pintarDatosMisPartidosApuestas(){
		$.ajax({
			type: 'POST',
			url: "sw_leerMisPartidosApuestas.php",
			data: { email: email },
			success: function(data){
				console.log(data);
				//convertimos en array de objetos el jason
				partidos = JSON.parse(data);
				$("#tblMisDatos tbody").html("");
				$.each(partidos, function( key, value ) {
					var fila="";
					fila+="<tr id='"+value.idPartido+"'>";
					fila+="	<td width='40px'>"+value.fecha+"</td>";
					fila+="	<td width='44px'>"+value.hora+"</td>";
					fila+="	<td width='42px'>"+value.minutoGolApuesta+"</td>";
					fila+="	<td width='47px'>"+value.importe+"</td>";			
					fila+="	<td width='179px'>"+value.nombre+" ("+value.minutoGolReal+")</td>";
					fila+=" <td width='20px'>";
			 		fila+=" <img style='cursor:pointer' onclick='confirmarEliminar("+value.idApuesta+")' src='iconos/delete.png' width='15'/>";
					fila+="</td></tr>"; 
					$("#tblMisDatos").append(fila);
				});				
			},
			error: function (xhr, status, error) {
				console.log("error:"+err.Message);
			}
		});
	}
	function confirmarEliminar(idApuesta)
	{
		valor=confirm("Seguro que deseas eliminar la apuesta ?");
		if (valor) location.href="eliminarApuesta.php?idApuesta="+idApuesta;
	}
	function confirmarEliminar(idApuesta){
		$.ajax({
			type: 'POST',
			url: "sw_verificarBorradoApuesta.php",
			data: { idapuesta: idApuesta },
			success: function(data){
				console.log(data);
				if (data==false)
				{
					alert("Una hora antes de su comienzo, comenzado o ya finalizado,			no es posible borrar la apuesta.")
				}
				else
				{
					valor=confirm("Seguro que deseas eliminar la apuesta ?");
					if (valor) location.href="eliminarApuesta.php?idApuesta="+idApuesta
							};
			},			
			error: function (xhr, status, error) {
				console.log("error:"+err.Message);
			}
		});
	}				
</script>
<?php
include("pie.php");
?>