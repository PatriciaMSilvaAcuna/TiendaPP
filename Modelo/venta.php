<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Venta</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
</header>


<h3 class="d-flex justify-content-center align-items-center pt-3 pr-2 pb-3 pl-2"> Procesar Venta </h3>

<form action = "venta.php" method="post">
Ingrese Prenda:

		<input type = "text" name="descripcion" required>
	
<br>
<br>
<input type="submit" class="btn btn-info btn-lg " value="Buscar">
</form>
<form action='procesarVenta.php' method='post'>
<?php 
    session_start();
	$conexion=mysqli_connect("localhost","root","","tiendapabeso") or
die("Problemas con la conexión");

if (isset($_REQUEST['descripcion'])) {
	$descripcion = mysqli_real_escape_string($conexion, $_REQUEST['descripcion']);
    $registro=mysqli_query($conexion, "SELECT id_Prenda,id_Precio, descripcion FROM prendas WHERE descripcion LIKE '%$descripcion%'")
    or die(" Problemas con la conexión".mysql_error($conexion));
  
  echo "<div class='text-center'>";
  if(mysqli_num_rows($registro) > 0) {
      while($reg=mysqli_fetch_array($registro)) {
        // Realiza la consulta para obtener el precio real
            $resultado = mysqli_query($conexion, "SELECT precio FROM precio WHERE id_Precio = ".$reg['id_Precio']);
            $fila = mysqli_fetch_assoc($resultado);
            $precio = $fila['precio'];

        echo "<div class='container'>";
        echo "<div class='row border-bottom'>";
        
        echo "<div class='col-sm'>";
        echo "<p><strong>ID Prenda:</strong> ".$reg['id_Prenda']."</p>";
        echo "</div>";
        echo "<div class='col-sm'>";
        echo "<p><strong>Descripcion:</strong> ".$reg['descripcion']."</p>";
        echo "</div>";
        echo "<div class='col-sm'>";
        echo "<p><strong>Precio:</strong> ".$precio."</p>";
        echo "</div>";
        echo "<div class='col-sm'>";
        echo "<input type='checkbox' name='prendas[]' value='".$reg['id_Prenda']."'> Seleccionar<br>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
         // guardo el id del precio
              $_SESSION['prendas_seleccionadas'][$reg['id_Prenda']] = array(
        'descripcion' => $reg['descripcion'],
        'id_Precio' => $reg['id_Precio'],
        'precio' => $precio

    ); 
          }
 } else {
  	

  	echo "<p style='color: red;'>Lo siento, no encuentro eso.</p>";
    
   }
}
mysqli_close($conexion);
?>

<br>
<input type="submit" class="btn btn-success btn-lg " value="Agregar">
<br>
<br>
</form>
<div class="d-flex justify-content-end">

<?php
    
	if ($_SESSION['id_Tipo_de_usuario'] == 1) {
		echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>';
	} else {
		echo '<a href="accesoAceptadoVendedor.php" class="btn btn-secondary btn-lg ">Volver</a>';
	}
?>

</div>
<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
</body>
</html>