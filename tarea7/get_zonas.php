<?php
include 'conexion.php';

if (isset($_POST['id_distrito'])) {
    $id_distrito = $_POST['id_distrito'];

    // Consultar las zonas relacionadas con el distrito seleccionado
    $query = "SELECT * FROM zonas WHERE distrito_id = '$id_distrito'";
    $result = mysqli_query($con, $query);

    // Generar las opciones de zona
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id_zona'] . '">' . $row['nombre'] . '</option>';
    }
}
?>
