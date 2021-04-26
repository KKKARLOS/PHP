<?php require "../header.php" ?>
<script>
var loadFile = function(event) {
    var output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<style>
img[src=""] {
   display: none;
}
</style>
<div class="intranet_content">
	<h3 class="intranet_section_title">MI PERFIL</h3>
	<div class="intranet_section_table">
		<?php //Cargamos los datos del usuario actual:
		//Obtenemos de la session el id de usuario
		require "../../model/cusuarios.php";
		$obj = new CUsuarios();
		$obj->Cargar($_SESSION["us_id"]);
		//Comprobamos si ya tiene una foto, sino ponemos el icono de por defecto:
		$ruta = "../../fotos/";
		$foto = "ic_usuario.png";
		if (strlen($obj->getFoto())>0) {
			$foto = $obj->getFoto();
		}
		//Mostramos un formulario para editar los datos actuales:
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<form name="form_editar" method="post" enctype="multipart/form-data" action="controller.php?op=5">
			<input type="hidden" name="id" value="<?php echo $obj->getID();?>"/>
			Tu nombre:<br/>
			<input type="text" name="nombre" value="<?php echo $obj->getNombre();?>"><br/>
			Tu email:<br/>
			<input type="text" name="mail" value="<?php echo $obj->getMail();?>" disabled><br/>
			Tu foto:<br/>
			<img src="<?php echo $ruta.$foto; ?>" width="120"/><br/>
			<input type="file" name="foto" onchange="loadFile(event)"><img id="preview" src="" width="60" /><br/>
			<p><input type="submit" value="Actualizar"></p>
		</form>
	</div>
</div>

<?php require "../footer.php" ?>