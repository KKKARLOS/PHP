<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		.container {
		    width:70%;
		    text-align:center;
		    margin: auto;
		}

		.left {
		    float:left;
		    width:100px;
		}

		.center {
		    display: inline-block;
		    margin:0 auto;
		    width:100px;
		}

		.right {
		    float:right;
		    width:100px;
		}
		.linea {
			width: 100%;
			margin: 20px; 
		}
	</style>
</head>
<body>

	<form method="POST" action="calcular.php">
		<div class="container">
			<h2>PRESUPUESTO VIAJES</h2>
			<div class="left">
				<img src="images/tenerife.jpg" width="150">
				<input type="radio" name="destino" value="1" required>
				<label>Tenerife</label>
			</div>
			<div class="center">
				<img src="images/benidorm.jpg" width="150">
				<input type="radio" name="destino" value="2">
				<label>Benidorm</label>
			</div>
			<div class="right">
				<img src="images/madrid.jpg" width="150">
				<input type="radio" name="destino" value="3">
				<label>Madrid</label>
			</div>
			<div class="linea">
				<label>DIAS:</label>
				<select name="dias" required>
					<option disabled selected value>-</option>
					<option value="7">7 días</option>
					<option value="10">10 días</option>
					<option value="15">15 días</option>
				</select>
			</div>
			<div class="linea">
				<input type="checkbox" name="seguro_viaje"/>
				<label>Añadir seguro de viaje</label>
			</div>
			<div class="linea">
				<label>VIAJEROS:</label>
				<input type="number" name="viajeros"  min="1" max="1000" style="width: 3em;" required/>
			</div>
			<div class="linea">
				<label>NOMBRE:</label>
				<input type="text" name="nombre" size="20" required/>
			</div>
			<div class="linea">
				<input type="submit" value="Calcular"/>
			</div>
		</div>
	</form>
</body>
</html>