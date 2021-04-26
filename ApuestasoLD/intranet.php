
<?php
	require("cabecera.php");
?>
	<style>
		h1 {text-align: center}
		ul{ list-style-type:none; margin:0; padding:0; margin-bottom:20px;}
		li { text-align:center;padding:5px 0;color:blue; 	}
		li:hover  {
    		background-color: gray; //mostrar el fondo gris del li activo
			}
		a:link
		{
			text-decoration: none;
		}
	</style>
<div style="width:510px;border:solid 1px black;height: 240px;position:absolute;top:100px;left:300px;background-color:lightgray" >
	<h2 style="text-align:center"><?php echo $_SESSION["nombre"]; ?></h2>
	<hr>
	<ul>
		<a href='misDatos.php?origen=intranet.php'><li>Mis datos<img src='iconos/person.png' style='vertical-align: bottom; margin-left:20px;'/></li></a>
		<a href='apuestas.php'><li>Apuestas <img src='iconos/euro.png' style='vertical-align: bottom; margin-left:20px;'/></li></a>
		<?php
			if ($_SESSION["rol"]=="A")
			{
				echo "<a href='catalogoUsuarios.php'><li>Mantenimiento de Usuarios  <img src='iconos/users.png' style='vertical-align: bottom; margin-left:20px;' /></li></a>";
				echo "<a href='catalogoPartidos.php'><li>Mantenimiento de Partidos  <img src='iconos/soccer.png' style='vertical-align: bottom; margin-left:20px;' /></li></a>";			
			}
		?>
		<a href='logout.php'><li>Salir de la aplicación<img src='iconos/volver.png' style="vertical-align: bottom; margin-left:20px; "/> </li></a>
	</ul>
</div>
<?php
require("pie.php");
?>

