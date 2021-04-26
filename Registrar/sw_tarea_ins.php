<?php
include("conexion_bd.php");
$tarea = $_POST["tarea"];
$consulta = "insert into tareas (tarea) values ('$tarea')";
mysqli_query($conexion,$consulta);
$idTarea = mysqli_insert_id($conexion);
//Devolvemos la respuesta:
echo $idTarea;
?>