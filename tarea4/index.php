<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_catastral = $_POST['cod_catastral'];
    
    // URL del servlet
    $url = "http://localhost:8080/WebApplication1/NewServlet?cod_catastral=" . urlencode($codigo_catastral);
    
    // Inicializar la sesión cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Ejecutar la solicitud
    $tipo_impuesto = curl_exec($ch);
    curl_close($ch);
    
    // Mostrar el tipo de impuesto
    echo "Tipo de impuesto: " . htmlspecialchars($tipo_impuesto);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Consultar Tipo de Impuesto</title>
</head>
<body>
    <h1>Consultar Tipo de Impuesto</h1>
    <form action="" method="post">
        Código Catastral: <input type="text" name="cod_catastral" required/>
        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>
