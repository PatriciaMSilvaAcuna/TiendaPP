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


<h3 class="d-flex justify-content-center align-items-center pt-3 pr-2 pb-3 pl-2"> Procesar Venta </h3>

<form action = "venta.php" method="post">
Ingrese ID de Prenda:
		<input type = "text" name="id_Prenda" required>
	
<br>
<br>
<input type="submit" class="btn btn-info btn-lg " value="Buscar">
</form>
<?php 
	$conexion=mysqli_connect("localhost","root","","tiendapabeso") or
die("Problemas con la conexión");

if (isset($_REQUEST['id_Prenda'])) {
    $registro=mysqli_query($conexion, "SELECT id_Prenda, descripcion FROM prendas where id_Prenda ='$_REQUEST[id_Prenda]'")
    or die(" Problemas con la conexión".mysql_error($conexion));

    if($reg=mysqli_fetch_array($registro)) {
        echo "ID Prenda: ".$reg['id_Prenda']."<br>";
        echo "Descripcion: ".$reg['descripcion']."<br>";
    }
} else {
    echo "ID de prenda no definido";
}

mysqli_close($conexion);
?>

<br>
<input type="submit" class="btn btn-success btn-lg " value="Agregar">

<div class="d-flex justify-content-end">
<a href="accesoAceptadoVendedor.html" class="btn btn-secondary btn-lg ">Volver</a>
</div>
<footer class="text-center bg-dark text-white py-3">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
</body>
</html>