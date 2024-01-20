<!DOCTYPE html>
<html lang="es">
<head>
<title>Consulta</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
</header>
 <div class="container py-5">
<div class="d-flex justify-content-center align-items-center" >
<div class="text-center">  

<form action="insertar_Prenda.php" method="post">
  <label for="descripcion">Ingrese Descripción:</label><br>
  <input type="text" id="descripcion" name="descripcion"><br>
  <br>
  <br>
  
  <input type="submit" value="Buscar">
</form>

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
<div>
<?php

    session_start();
    if ($_SESSION['id_Tipo_de_usuario'] == 1) {
        echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>';
    } else {
        echo '<a href="accesoAceptadoVendedor.php" class="btn btn-secondary btn-lg ">Volver</a>';
    }
?>
<br>
<br>
<br>
</div>
</div>
<footer class="text-center bg-dark text-white py-3 mt-auto fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>     
</body>
</html>