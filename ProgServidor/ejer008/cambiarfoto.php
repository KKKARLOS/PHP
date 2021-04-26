<?php
$origen = $_FILES['fotoperfil']['tmp_name'];
$destino = "images/fotoperfil.jpg";
//Recojo el archivo con la foto:
if (move_uploaded_file($origen, $destino)) {
    echo "Subido!";
} else {
	echo "Error";
}
header("Location:misdatos.php");
?>