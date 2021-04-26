<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../css/jquery-ui.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<title>Documento sin título</title>
<style type="text/css">
	.oculta{
		display: none;
	}	
	.contenedor {
		width:594px;
		height:146px;
		background-color:blue; 
		z-index: -100;
	} 
	img{		
		z-index: 1000;
		width:125px;
		height:125px;
		margin:10px;
		display:inline-block;
	}
</style>
</head>
<body background="../images/tragaperras.jpg">

<!--Ventana de Opciones-->

<div id="PartidaDialog" class="oculta" title="Partida">
  <h3><label id="lblBienvenida"></label></h3>
  <div style="float: right "><strong style="margin-right:12px">Saldo:</strong><label id="lblSaldo" style="margin-right:2px;width: 150px;border-color:#FFB100;
		border-width:1px;
border-style:solid;
background:#F5F5F5;"></label></div>
  </br></br></br>
	<div id="divTragaperras" class="contenedor">
		<img src="../images/ic_int.png"/>
		<img src="../images/ic_int.png"/>
		<img src="../images/ic_int.png"/>
		<img src="../images/ic_int.png"/>
	</div>
	<br/>
	<h3 id="premio" style="text-align: center "></h3>
	<br/>
	<p align="center">
		<input type="button" id="btnJugar" value="Jugar" style="width:110px;margin-right:10px;cursor:pointer"/>
		<input type="button" id="btnSalir" value="Salir" style="width:110px;margin-left:10px;cursor:pointer"/>
	</p>  
</div>
-->
<script>
	$(function(){
		// Inicializar ventana de opciones 	
		dialog = $( "#PartidaDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },
		  height: 480,
		  width: 630,
		  modal: true,
		});
			
		$("input").removeClass("oculta");							
		$("#PartidaDialog" ).dialog("open");

		$("#btnJugar" ).on("click",function(){
			parameters={funcion: "Jugar"};				
			$.ajax({
				type: "POST",
				url: "../servicios/sw_partida.php",
				data: parameters,
				success: function(data){
					partida = JSON.parse(data);
					pintarTragaperrasPremio(partida);
					pintarSaldo();	
				},			
				error: function (xhr, status, error) {
					alert("error:"+err.Message);
				}
			});			
		});
	
		$("#btnSalir" ).on("click",function(){
			location.href="main.php";
		});	
		
		pintarSaldo();
	});	
	function pintarTragaperrasPremio(partida){		
		$("#premio").html("Premio: "+partida.premio+ " euro/s");
		tragaperras="";
		for (x=0;x<partida.valores.length;x++)
		{
		tragaperras+="<img src='../images/im_"+partida.valores[x]+".png'/>";			
		}	
		$("#divTragaperras").html(tragaperras);	
		pintarSaldo();
/*
		parameters={funcion: "actualizarSaldo", importe: partida.premio};

		$.ajax({
				type: "POST",
			url: "../servicios/sw_usuario.php",
			data: parameters,
			success: function(data){
				usuario = JSON.parse(data);
				importe= new Intl.NumberFormat('es-ES').format(usuario.saldo) + " euros";
				$("#lblSaldo").html(importe);
				if (usuario.saldo<usuario.saldoMinimo)
					$("#btnJugar").attr("disabled",true);
				else
					$("#btnJugar").attr("disabled",false);
			},			
			error: function (xhr, status, error) {
				alert("error:"+err.Message);
			}
		});	
*/		
	}
	function pintarSaldo(){
		parameters={funcion: ""};
		$.ajax({
			type: 'POST',
			url: "../servicios/sw_usuario.php",
			data: parameters,
			success: function(data){
				usuario = JSON.parse(data);
				importe= new Intl.NumberFormat('es-ES').format(usuario.saldo) + " euros";
				
				$("#lblSaldo").html(importe);
				$("#lblBienvenida").text("Bienvenido/a " + usuario.usuario);

				if (usuario.saldo<usuario.saldoMinimo)		
					$("#btnJugar").attr("disabled",true);
				else
					$("#btnJugar").attr("disabled",false);				
			},			
			error: function (xhr, status, error) {
				alert("error:"+err.Message);	
			}
		});
	}
</script>
</body>
</html>