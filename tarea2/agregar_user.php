<?php

// Conexión a la base de datos
include 'conexion.php';

$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$usuario_ci = $_POST['usuario_ci'];
$direccion = $_POST['usuario_direccion'];
$distrito = (int)$_POST['usuario_distrito'];
$zona = (int)$_POST['usuario_zona'];
$user = $_POST['usuario_usuario'];
$email = $_POST['usuario_email'];
$clave_1 = $_POST['usuario_clave_1'];
$clave_2 = $_POST['usuario_clave_2'];
$privilegio = 0;
switch ($_POST['usuario_privilegio']) {
    case 'Control total':
        $privilegio = 1;
        break;
    case 'Edición':
        $privilegio = 2;
        break;
    case 'Registrar':
        $privilegio = 3;
        break;
}



$sql = "INSERT INTO personas (nombre, paterno, materno, dni, direccion, distrito_id, zona_id, user, password, rol) 
		VALUES ('$nombre', '$paterno', '$materno', '$usuario_ci', '$direccion', '$distrito', '$zona', '$user', '$clave_1', '$privilegio')";

mysqli_query($con, $sql); // Corrección: mysqli_query
header('Location: lista_usuario.php');


?>