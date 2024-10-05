<?php

// Conexión a la base de datos
include 'conexion.php';

/*$usuario_admin = $_GET['usuario_admin'];
$clave_admin = $_GET['clave_admin'];

$sql = "SELECT count(*) valor FROM personas WHERE user = '$usuario_admin' AND password = '$clave_admin'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

if($fila['valor'] = 0)
{
    header('Location: lista_usuario.php');
}*/

$id = $_GET['id_a'];
$nombre = $_GET['nombre'];
$paterno = $_GET['paterno'];
$materno = $_GET['materno'];
$usuario_ci = $_GET['usuario_ci'];
$direccion = $_GET['direccion'];
$user = $_GET['usuario_usuario'];
$email = $_GET['usuario_email'];
$clave_nueva_1 = $_GET['usuario_clave_nueva_1'];
$clave_nueva_2 = $_GET['usuario_clave_nueva_2'];
$privilegio = 0;
switch ($_GET['usuario_privilegio']) {
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





$sql = "UPDATE personas SET nombre='$nombre', paterno='$paterno', materno='$materno', dni='$usuario_ci', direccion='$direccion', user='$user', password='$clave_nueva_1', rol='$privilegio' WHERE id_persona=$id";

mysqli_query($con, $sql); // Corrección: mysqli_query
header('Location: lista_usuario.php');


?>