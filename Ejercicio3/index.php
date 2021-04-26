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
<form action="calcular.php" method="post">
    <table width="500" border="0" cellpadding="10px" align="center" style="margin-top:90px">
      <tr style="background-color:gray">
      <td colspan=3 align="center" >
      <H1 >Presupuesto viaje</H1>
	   </td>
      </tr>
      <tr>
        <td width="163" valign="top"><img src="tenerife.jpg" width="148" height="102" />
          <input name="rdbDestino" type="radio" id="rdbDestino" value="1" checked/>
          Tenerife
        </td>
        <td width="149" valign="top"><img src="benidor.jpg" width="131" height="102" />
        <input type="radio" name="rdbDestino" value="2" id="rdbDestino" />
            Benidor
        </td>
        <td width="154" valign="top"><img src="madrid.jpg" width="131" height="102" />&nbsp;&nbsp;
     <input type="radio" name="rdbDestino" value="3" id="rdbDestino" />            Madrid</td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3">Días: 
          <select name="cboDias" id="cboDias" required onchange="seleccionarHabitacion(this.value)">
            <option value="0" selected="selected">[Seleccione un número de días]</option>
            <option value="1">7 días</option>
            <option value="2">10 días</option>
            <option value="3">15 días</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="3">Seguro de viaje: 
          <input type="checkbox" name="chkSeguro" id="chkSeguro" value="1" checked="checked" />
        </td>
      </tr>
      <tr>
        <td colspan="3">Número de viajeros: 
        <input type="number" id="txtNumeroViajeros" name="txtNumeroViajeros" required value="1" style="width:30px"/></td>
      </tr>
      <tr>
        <td colspan="3">Nombre: 
        <input type="text" id="txtNombre" name="txtNombre"value="" required style="width:400px"/></td>
      </tr>
      <tr>
        <td colspan="3" align="center"><input style="height:35px; width:110px;background-color:grey" type="submit" name="btnCambiar" id="btnCalcular" value="Calcular" /></td>
      </tr>  
    </table>
</form>
</body>
</html>
