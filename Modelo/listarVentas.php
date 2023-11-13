<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Venta</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="vh-100">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
</header>


<?php
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select * from ventas") or
  die("Problemas en el select:".mysqli_error($conexion));

if (mysqli_num_rows($registros) > 0){
echo "<h1>Listado de Ventas</h1>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>ID Venta</th>";
echo "<th>ID Empleado</th>";
echo "<th>Fecha Venta</th>";
echo "<th>ID Medio de Pago</th>";
echo "<th>total</th>";
echo "</tr>";

while ($reg=mysqli_fetch_array($registros))
{
  echo "<tr>";
  echo "<td>" . $reg['id_ventas'] . "</td>";
  echo "<td>" . $reg['id_Empleado'] . "</td>";
  echo "<td>" . $reg['fecha_Venta'] . "</td>";
  echo "<td>" . $reg['id_Medio_de_pago'] . "</td>";
  echo "<td>" . $reg['total'] . "</td>";
  
  echo "</tr>";
}

echo "</table>";

} else{
  echo "Lo siento no hay ventas disponibles";
}

mysqli_close($conexion);
?>

<div class="d-flex justify-content-end">
<a href="http://localhost:8080/Tienda/vista/accesoAceptadoAdmin.html" class="btn btn-secondary btn-lg ">Volver</a>
</div>

<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
</body>
</html>