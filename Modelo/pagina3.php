<!DOCTYPE html>
<html lang="en">
<head>
<title>Consulta</title>
<link rel="stylesheet" type="text/css" href="./precio.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    INNER JOIN precio ON prendas.id_Precio = precio.id_Precio 
    WHERE prendas.descripcion LIKE '%$descripcion%'") or
    die("Problemas en el select:".mysqli_error($conexion));

    if(mysqli_num_rows($registros) > 0) {
       echo "<h1>Prendas Encontradas</h1>";
        while($reg=mysqli_fetch_array($registros)) {
                 
            echo " <form>";
            
            echo "Descripción: <input type='text' name='descripcion' value='" . $reg['descripcion'] . "'><br>";
            echo "Stock: <input type='text' name='stock' value='" . $reg['stock'] . "'><br>";
            echo "<div class='bg-warning p-3'>Precio $: <input type='text' name='precio' value='" . $reg['precio'] . "'></div><br>";
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>