<?php 
	include "conexion.php";

	$id = $_GET['id_a'];
	$sql = "DELETE FROM propiedades WHERE id_propiedad = '$id'";
	mysqli_query($con, $sql);
	header('Location: lista_usuario.php');
?>