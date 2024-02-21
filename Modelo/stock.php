<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
 <div class="container py-5">
<div class="d-flex justify-content-center align-items-center" >
<div class="text-center">   
<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tiendapabeso") or die("<div class='alert alert-danger' role='alert'>Problemas con la conexión</div>");

// Recogida de datos del formulario
$descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

// Consulta SQL para buscar la prenda
$sql = "SELECT * FROM prendas WHERE descripcion LIKE '%$descripcion%'";

// Ejecución de la consulta
$resultado = mysqli_query($conexion, $sql);

// Verificación de los resultados
if (mysqli_num_rows($resultado) > 0) {
    // Si se encontraron resultados, se muestran en una tabla
    echo "<table class='table'>";
    echo "<tr><th>ID</th><th>Descripción</th><th>Stock</th></tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr><td>" . $fila['id_Prenda'] . "</td><td>" . $fila['descripcion'] . "</td><td>" . $fila['stock'] . "</td></tr>";
    }
    echo "</table>";
} else {
    // Si no se encontraron resultados, se muestra un mensaje
    echo "<div class='alert alert-warning' role='alert'>No se encontraron prendas con esa descripción.</div>";
}

// Cierre de la conexión
mysqli_close($conexion);
?>
<?php

    session_start();
    if ($_SESSION['id_Tipo_de_usuario'] == 1) {
        echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>';
    } else {
        echo '<a href="accesoAceptadoVendedor.php" class="btn btn-secondary btn-lg ">Volver</a>';
    }
?>
</div>
</div>
</div>
<footer class="text-center bg-dark text-white py-3 mt-auto fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>     
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>