<?php 
	include "conexion.php";

	$id_person = $_POST['id_a'];
	$impuesto = $_POST['item_impuesto'];
	$direccion_p = $_POST['prop_direccion'];

	$random_numbers = rand(10, 99); // Número aleatorio entre 100 y 999
	$random_suffix = rand(1000, 9999); // Número aleatorio entre 1000 y 9999

	$impuesto_formateado = sprintf('%d%d-%d', $impuesto, $random_numbers, $random_suffix);
	$impuesto_formateado = (string)$impuesto_formateado; 

	$sql = "INSERT INTO propiedades(cod_catastral, direccion, id_persona) VALUES('$impuesto_formateado', '$direccion_p', '$id_person')";
	mysqli_query($con, $sql); // Corrección: mysqli_query
	header('Location: lista_usuario.php');

?>