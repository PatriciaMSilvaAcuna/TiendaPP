<!DOCTYPE html>
<html lang="en">
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

<div class="card w-50 h-75 m-auto">
            <div class="card-header bg-success text-white text-center">
             <h4> Procesar Venta</h4>
    </div>
    <div class="card-body">

<form action = "venta.php" method="post">
<h5 class="card-title">Ingrese prenda: </h5>
        
           <input type="text" name="descripcion" placeholder=" Ingrese Prenda" class="form-control border border-5"required>
    
<br>
<br>
<input type="submit" class="btn btn-outline-info btn-lg d-grid w-100 " value="Buscar">
</form>
<form action='procesarVenta.php' method='post'>
<?php 
    session_start();
    $conexion=mysqli_connect("localhost","root","","tiendapabeso") or
die("Problemas con la conexión");

if (isset($_REQUEST['descripcion'])) {
    $descripcion = mysqli_real_escape_string($conexion, $_REQUEST['descripcion']);
    $registro=mysqli_query($conexion, "SELECT p.id_Prenda, p.descripcion AS Descripcion, t.nombre AS Talle, c.nombre AS Color, i.precio AS Precio
FROM prendas AS p
JOIN tipodeprenda AS t ON p.id_Tipo_de_prenda = t.id_Tipo_de_prenda
JOIN color AS c ON p.id_Color = c.id_Color
JOIN precio AS i ON p.id_Precio = i.id_Precio
WHERE p.descripcion LIKE '%$descripcion%'")
    or die(" Problemas con la conexión".mysqli_error($conexion));
  
  echo "<div class='text-center'>";
  if(mysqli_num_rows($registro) > 0) {
      while($reg=mysqli_fetch_array($registro)) {
        echo "<div class='container'>";
        echo "<div class='row border-bottom border-border-3'>";
        
        echo "<div class='col-sm'>";
        echo "<p><strong>ID Prenda:</strong> ".$reg['id_Prenda']."</p>";
        echo "</div>";
        echo "<div class='col-sm'>";
        echo "<p><strong>Descripcion:</strong> ".$reg['Descripcion']."</p>";
        echo "</div>";
        echo "<div class='col-sm'>";
        echo "<p><strong>Precio:</strong> ".$reg['Precio']."</p>";
        echo "</div>";
        echo "<div class='col-sm'>";
        echo "<input type='checkbox' name='prendas[]' value='".$reg['id_Prenda']."'> Seleccionar<br>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
         // guardo el precio
              $_SESSION['prendas_seleccionadas'][$reg['id_Prenda']] = array(
        'descripcion' => $reg['Descripcion'],
        'precio' => $reg['Precio']
    ); 
          }
 } else {
    

    echo "<p style='color: red;'>Lo siento, no encuentro eso.</p>";
    
   }
}
mysqli_close($conexion);
?>

<br>
<input type="submit" class="btn btn-outline-primary btn-lg d-grid w-100" value="Agregar">
<br>
<br>
</div>
</div>
<div class="card-footer">

<?php
    
    if ($_SESSION['id_Tipo_de_usuario'] == 1) {
        echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg d-grid w-100">Volver</a>';
    } else {
        echo '<a href="accesoAceptadoVendedor.php" class="btn btn-secondary btn-lg d-grid w-100">Volver</a>';
    }
?>

</div>
<br>
<br>
<br>

    </form>
<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  
</body>
</html>
