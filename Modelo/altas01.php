<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="vh-100 text-center">
    


<?php
// Conecta a la base de datos
session_start();
$conexion = mysqli_connect("localhost", "root", "", "tiendapabeso") or die ("problemas con la conexion");

// Recoge los datos del formulario
$id_Prenda = $_POST['prenda']; 
$cantidad = $_POST['cantidad'];

// Crea la consulta SQL
$sql = "UPDATE prendas SET stock = stock + '$cantidad' WHERE id_Prenda = '$id_Prenda'";

// Ejecuta la consulta
if (mysqli_query($conexion, $sql)) {
    echo '<div class="alert alert-success" role="alert">Stock de la prenda actualizado con éxito</div>';
    echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>';

} else {
    echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . mysqli_error($conexion) . '</div>';
    echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>';
}

// Cierra la conexión
mysqli_close($conexion);
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  

</body>
</html>
