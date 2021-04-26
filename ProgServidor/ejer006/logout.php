<?php
session_start();
//Eliminamos las variables de sesión:
session_unset();
header("Location:login.php");
?>