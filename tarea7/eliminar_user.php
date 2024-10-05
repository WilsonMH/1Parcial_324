<?php 
	include 'conexion.php';

	$id = $_GET['id_e'];
	$sql = "DELETE FROM personas WHERE id_persona = '$id'";
	mysqli_query($con, $sql);
	header('Location: lista_usuario.php');
?>