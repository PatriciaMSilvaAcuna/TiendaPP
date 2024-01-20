<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tiendapabeso") or die("<div class='alert alert-danger' role='alert'>Problemas con la conexión</div>");

// Recogida de datos del formulario
$descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
$id_Tipo_de_prenda = mysqli_real_escape_string($conexion, $_POST['id_Tipo_de_prenda']);
$id_color = mysqli_real_escape_string($conexion, $_POST['id_color']);
$id_talle = mysqli_real_escape_string($conexion, $_POST['id_talle']);
$Stock = mysqli_real_escape_string($conexion, $_POST['Stock']);
$Precio = mysqli_real_escape_string($conexion, $_POST['Precio']);

// Validación de los datos
if (empty($descripcion) || empty($id_Tipo_de_prenda) || empty($id_color) || empty($id_talle) || empty($Stock) || empty($Precio) ) {
    die("<div class='alert alert-warning' role='alert'>Por favor, completa todos los campos.</div>");
}

if (!is_numeric($id_Tipo_de_prenda) || !is_numeric($id_color) || !is_numeric($id_talle) || !is_numeric($Stock) || !is_numeric($Precio) ) {
    die("<div class='alert alert-warning' role='alert'>Por favor, ingresa números válidos para los IDs y el stock.</div>");
}

// Consulta SQL para insertar los datos
$sql = "INSERT INTO prendas (descripcion, id_Tipo_de_prenda, id_Color, id_Talle, Stock, precio) VALUES ('$descripcion', '$id_Tipo_de_prenda', '$id_color', '$id_talle', '$Stock', '$Precio')";

// Ejecución de la consulta
if (mysqli_query($conexion, $sql)) {
    echo "<div class='alert alert-success' role='alert'>Nueva prenda insertada con éxito</div>";
} else {
    echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . mysqli_error($conexion) . "</div>";
}

// Cierre de la conexión
mysqli_close($conexion);
?>