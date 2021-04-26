<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../css/jquery-ui.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/moment.js"></script>
<title>Documento sin título</title>
<style type="text/css">
	.oculta{display: none;}
	.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {text-align: center; 
		float: none !important; 
	}
</style>
</head>
<body background="../images/banco.jpg">
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
<div style="width:710px;border:solid 1px black;height:490px;position:absolute;top:170px;left:200px;background-color:lightgray" >
	<h2  style="text-align:center; margin-top:10px;">Movimientos de la cuenta</h2>
	<hr>
	<div style="text-align: center; margin-top:10px;"> 
		<div style="float: left;display:inline-block;">
			<bold style="margin:20px;font-size:20px">Cta:</bold><label id="lblCuenta"></label>
			<strong><label style="margin-left:420px">Saldo:</label></strong><label style="margin-left:10px;font-size:20px" id="lblSaldo"></label>	
		</div>

		<table id="tblCabecera" width="660px">
			<tr>
				<th width="260px">Denominacion</th>		
				<th width="90px">Importe</th>		
				<th width="90px">Fecha</th>
			</tr>
		</table>
		<div id="divMovimientos" style="height:280px;overflow-y:auto;width:696px;">			
			<table id="tblDatos" width="660px"		>
				<tbody>	
					<tr style="height:20px">
						<td width='260px'></td>
						<td width='90px'></td>
						<td width='90px'></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div style="text-align: right; margin-right:32px; margin-top:30px"> 
		<input style="width:110px;height: 30px;" type="button" name="btnSalir" id="btnSalir" value="Salir" />
	</div>	
</div>

	
<script type="text/javascript">
	var idcuenta = <?php echo $_GET["idcuenta"];?>;
	$("#lblCuenta").html(idcuenta);
	$(document).ready(function(){
		pintarSaldoMovimientos(idcuenta);

	  	$('body').on('click', '#btnSalir', function(){
	  		location.href="main.php?idcuenta="+idcuenta;	  		
	  	});	  	
	})
	function pintarSaldoMovimientos(idcuenta){
		parameters={
				funcion: "Movimientos",
				idcuenta: idcuenta
		};
		$.ajax({
			type: 'POST',
			url: "../servicios/sw_cuenta.php",
			data: parameters,
			success: function(data){
				cuenta = JSON.parse(data);
				importe = new Intl.NumberFormat('es-ES').format(cuenta.saldo) + " euros";
				$("#lblSaldo").html(importe);
				$("#tblDatos tbody").html("");
				$.each(cuenta.movimientos, function( key, value ) {
					var fila="";
					fila+="<tr id='"+value.idPartido+"'>";
					fila+="	<td width='260px'>"+value.denominacion+"</td>";	
					importe= new Intl.NumberFormat('es-ES').format(value.importe)
					fila+="	<td width='90px'>"+importe+"</td>";									
					fila+="	<td width='90px'>"+moment(value.fecha).format('DD/MM/YYYY');+"</td>";
					fila+="</tr>"; 
					$("#tblDatos").append(fila);
				});					
			},			
			error: function (xhr, status, error) {
				alert("error:"+err.Message);	
			}
		});
	}				
</script>
</body>
</html>