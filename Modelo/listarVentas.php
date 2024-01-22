<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ventas del Dia</title>
  <link rel="stylesheet" type="text/css" href="./css.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  

</head>
<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">

<div class="container">
<?php
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or
    die("Problemas con la conexión");

$fecha_actual = date("Y-m-d"); // obtiene la fecha actual

$registros=mysqli_query($conexion,"select * from ventas where DATE(fecha_Venta) = '$fecha_actual'") or
  die("Problemas en el select:".mysqli_error($conexion));

$totalVentas=mysqli_query($conexion,"select SUM(total) as totalVentas from ventas where DATE(fecha_Venta) = '$fecha_actual'") or
  die("Problemas en el select:".mysqli_error($conexion));
$totalVentasDia = mysqli_fetch_assoc($totalVentas);

if (mysqli_num_rows($registros) > 0){
echo "<h1>Listado de Ventas del día</h1>";
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
  echo "<td>" . $reg['id_Ventas'] . "</td>";
  echo "<td>" . $reg['id_Empleado'] . "</td>";
  echo "<td>" . $reg['fecha_Venta'] . "</td>";
  echo "<td>" . $reg['id_Medio_de_pago'] . "</td>";
  echo "<td>" . $reg['total'] . "</td>";
  
  echo "</tr>";
}

echo "</table>";
echo "<h2>Total de ventas del día: " . $totalVentasDia['totalVentas'] . "</h2>";

} else{
  echo "Lo siento no hay ventas disponibles para el día de hoy";
}

mysqli_close($conexion);
?>


<div>
<a href="../Vista/AdministracionEmpleados.html" class="btn btn-secondary btn-lg ">Volver</a>        
</div>
<br>
<br>
<br>
<br>
<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>     
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

</body>
</html>