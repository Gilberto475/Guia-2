<?php
$hostname = "localhost";
$username = "root";
$bdpassword = "";
$bdname = "formulario";
$conectar = mysqli_connect($hostname, $username, $bdpassword, $bdname);
if (!$conectar) {
    echo '<script>alert("Error al conectar la base de datos")</script>';
} else {
    echo '<script>alert("Conexion Exitosa")</script>'; 
}
?>
