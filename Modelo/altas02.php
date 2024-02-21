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
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "tiendapabeso") or die ("problemas con la conexion");

    // Recogida de datos del formulario
    $prenda = $_POST['prenda'];
    $color = $_POST['id_color'];
    $talle = $_POST['id_talle'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];

    // Inserción de los datos en la tabla de prendas
    $insertar = "INSERT INTO prendas (id_Tipo_de_prenda, id_Color, id_Talle, descripcion, stock, precio) VALUES ('$prenda', '$color', '$talle', '$descripcion', '$stock', '$precio')";

    // Ejecución de la consulta
    $resultado = mysqli_query($conexion, $insertar) or die ("Problemas con el insert: " . mysqli_error($conexion));

    // Comprobación de la inserción
    if($resultado){
        
        echo '<div class="alert alert-success" role="alert">La prenda ha sido añadida correctamente.</div>';
        echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>';

    } else {

        echo '<div class="alert alert-danger" role="alert">Ha habido un problema al añadir la prenda.</div>';
    echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>';

    }

    // Cierre de la conexión
    mysqli_close($conexion);
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  

</body>
</html>
