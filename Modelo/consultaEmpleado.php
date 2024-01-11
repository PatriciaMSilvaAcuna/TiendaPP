<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Consulta Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="vh-100 text-center">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
</header>

<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tiendapabeso");

// Verificar la conexión
if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Realizar la consulta SQL
$resultado = mysqli_query($conexion, "SELECT * from empleado");

// Verificar si la consulta fue exitosa
if (mysqli_num_rows($resultado) > 0) {
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>DNI</th>";
    echo "<th>Usuario</th>";
    echo "<th>Estado</th>";
    echo "<th>id_Tipo_de_usuario</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Imprimir los resultados
    while($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila["id_Empleado"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["dni"] . "</td>";
        echo "<td>" . $fila["usuario"] . "</td>";
        echo "<td>" . $fila["estado"] . "</td>";
        echo "<td>" . $fila["id_Tipo_de_usuario"] ."</td>";
        
    }

    // Cerrar la tabla
    echo "</tbody>";
    echo "</table>";  }
else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
<a href="../Vista/AdministracionEmpleados.html" class="btn btn-secondary btn-lg ">Volver</a>	


</body>
</html>