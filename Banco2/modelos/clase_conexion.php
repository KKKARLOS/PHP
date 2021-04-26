<?php

class conexion extends mysqli {
    public function __construct($host, $usuario, $contraseña, $bd) {
        parent::__construct($host, $usuario, $contraseña, $bd);

        if (mysqli_connect_error()) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }
}

/*
$bd = new conexion('localhost', 'mi_usuario', 'mi_contraseña', 'mi_bd');
echo 'Éxito... ' . $bd->host_info . "\n";
$bd->close();
*/
?>
<?php
 try{
    $pdo = new PDO('mysql:host=localhost;dbname=batman', 'root', '');
 }catch(PDOException $e){
    echo 'Error al conectarse con la base de datos: ' . $e->getMessage();
    exit;
 }
?>