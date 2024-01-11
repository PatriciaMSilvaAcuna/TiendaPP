<?php
// Conecta a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tiendapabeso") or die ("problemas con la conexion");

// Recoge los datos del formulario
$id_Tipo_de_prenda = $_POST['prendas'];
$id_Color = $_POST['colorP'];
$id_Talle = $_POST['talle'];
$cantidad = $_POST['cantidad'];

// Crea la consulta SQL
$sql = "INSERT INTO prendas (id_Tipo_de_prenda, id_Color, id_Talle, stock) VALUES ('$id_Tipo_de_prenda', '$id_Color', '$id_Talle', '$cantidad')";

// Ejecuta la consulta
if (mysqli_query($conexion, $sql)) {
    echo "Nueva prenda insertada con éxito";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

// Cierra la conexión
mysqli_close($conexion);
?>