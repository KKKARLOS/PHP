<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
table{border:1px solid black;border-collapse:collapse;}
td{border:1px solid black;}
</style>
</head>
<body>
<?php
  $seguro="no";
  if (isset($_POST["chkSeguro"])) $seguro="si";

  $total=0;
  if ($_POST["rdbDestino"]==1){
    $total=200*$_POST["cboDias"];
    $destino="Tenerife";
  }elseif ($_POST["rdbDestino"]==2){
    $total=150*$_POST["cboDias"];
    $destino="Benidor";
  }else{
    $total=100*$_POST["cboDias"];
    $destino="Madrid";
  }
  $total = $total * $_POST["txtNumeroViajeros"];
  if ($seguro=="si") $total=$total+30;

  //print "Total: ".$total; 
?>
<table width="400" border="1" cellpadding="10px" align="center" style="margin-top:90px">
  <tr style="background-color:gray">
    <td colspan="2" align="center">
    	<h1>Resumen del presupuesto</hr></h1>
    </td>
  </tr>
  <tr>
    <td width="104">Destino</td>
    <td width="280"><label id="lblDestino"><?php print($destino);?></label></td>
  </tr>
  <tr>
    <td>Días</td>
    <td><label id="lblDias"><?php print($_POST["cboDias"]);?></label></td>
  </tr>
  <tr>
    <td>Seguro</td>
    <td><label id="lblSeguro"><?php print($seguro);?></label></td>
  </tr>
  <tr>
    <td>Número de viajeros</td>
    <td><label id="lblNViajeros"><?php print($_POST["txtNumeroViajeros"]);?></label></td>
  </tr>
  <tr>
    <td>Nombre</td>
    <td><label id="lblNombre"><?php print($_POST["txtNombre"]);?></label></td>
  </tr>
  <tr style="background-color:gray">
    <td><strong>Presupuesto</strong></td>
    <td><label id="lblDestino"><?php print($total);?></label></td>
  </tr>
</table>

</body>
</html>
