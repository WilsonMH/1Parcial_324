<?php

session_start();
// Conexión a la base de datos
include 'conexion.php';

$usuario = $_POST['usuario'];
$password = $_POST['clave'];

$sql = "SELECT count(*) cantidad, rol FROM personas WHERE user = '$usuario' AND password = '$password'";
$resultado = mysqli_query($con, $sql); // Corrección: mysqli_query
$fila = mysqli_fetch_array($resultado); // Corrección: mysqli_fetch_array
print_r($fila);
if ($fila['cantidad']!=0)
{
	$_SESSION['usuario']= $usuario;
	$_SESSION['rol'] = $fila['rol'];
	header('Location: home.php');
}
else
	header('Location: login.php');

?>