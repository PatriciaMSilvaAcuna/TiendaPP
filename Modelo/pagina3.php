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
<?php
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or
    die("Problemas con la conexión");

if (isset($_REQUEST['descripcion'])) {
    $descripcion = mysqli_real_escape_string($conexion, $_REQUEST['descripcion']);
    $registros=mysqli_query($conexion,"SELECT prendas.id_Prenda, prendas.descripcion, prendas.stock, precio.precio
    FROM prendas 
    INNER JOIN precio ON prendas.id_Prenda = precio.id_Prenda 
    WHERE prendas.descripcion LIKE '%$descripcion%'") or
    die("Problemas en el select:".mysqli_error($conexion));

    if(mysqli_num_rows($registros) > 0) {
       echo "<h1>Prendas Encontradas</h1>";
        while($reg=mysqli_fetch_array($registros)) {
                 
            echo " <form>";
            echo "ID: <input type='text' name='id_Prenda' value='" . $reg['id_Prenda'] . "'><br>";
            echo "Descripción: <input type='text' name='descripcion' value='" . $reg['descripcion'] . "'><br>";
            echo "Stock: <input type='text' name='stock' value='" . $reg['stock'] . "'><br>";
            echo "Precio: <input type='text' name='precio' value='" . $reg['precio'] . "'><br>";
            echo "</form>";
            echo "----------------------------------------------";
        }
    } else {
        echo "<p style='color: red;'>No se encontró prendas con esa descripcion.</p>";
    }
}
mysqli_close($conexion);
?>
<div>
<a href="consultaPrecio.php" class="btn btn-secondary btn-lg">Volver</a>
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