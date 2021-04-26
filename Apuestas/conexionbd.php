<?php
//LOCAL:

$conexion=mysqli_connect("localhost","root","");
mysqli_set_charset($conexion,'utf8');
mysqli_select_db($conexion,"apuestas");

/*
$conexion=mysqli_connect("mysql.bymhost.com","cebanc_jcper","B*wLai-U");
mysqli_set_charset($conexion,'utf8');
mysqli_select_db($conexion,"ceb_jcper_apuestas");
*/
?>