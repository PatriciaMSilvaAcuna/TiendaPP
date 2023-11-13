<html>
<head>
<title>Consulta</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
</header>
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
<div class="text-center">      
<?php
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"SELECT prendas.id_Prenda, prendas.descripcion, prendas.stock, precio.precio
FROM prendas 
INNER JOIN precio ON prendas.id_Prenda = precio.id_Prenda 
WHERE prendas.id_Prenda = '$_REQUEST[id_Prenda]'") or
  die("Problemas en el select:".mysqli_error($conexion));

if ($reg=mysqli_fetch_array($registros))
{
  echo "<h1>Datos de la Prenda</h1>";     
  echo " <form>";
  echo "ID: <input type='text' name='id_Prenda' value='" . $reg['id_Prenda'] . "'><br>";
  echo "Descripción: <input type='text' name='descripcion' value='" . $reg['descripcion'] . "'><br>";
  echo "Stock: <input type='text' name='stock' value='" . $reg['stock'] . "'><br>";
  echo "Precio: <input type='text' name='precio' value='" . $reg['precio'] . "'><br>";
  echo "</form>";

  }
else
{
  echo "Lo siento no encuentro esa prenda";
}
mysqli_close($conexion);
?>
<a href="http://localhost:8080/Tienda/vista/accesoAceptadoVendedor.html" class="btn btn-secondary btn-lg ">Volver</a>

<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>     
</body>
</html>