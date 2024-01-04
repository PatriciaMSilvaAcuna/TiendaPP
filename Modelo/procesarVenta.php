<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<h2 class="text-center bg-dark text-danger py-3">Información de Pago</h2>
<form action="procesar_venta.php" method="post">
    <div class= "text-center">
    <label for="medio_de_pago">Medio de Pago:</label><br>
    <select id="medio_de_pago" name="medio_de_pago">
        <option value="1">Efectivo</option>
         <option value="2">Tarjeta de Débito</option>
        <option value="3">Tarjeta de Crédito</option>
       
        
    </select><br>
    
    <label for="precio">Subtotal:</label><br>
    <input type="text" id="precio" name="precio" value="<?php session_start(); echo $id_Precio; ?>" readonly><br><br><br>

    <br>
    <h3>Productos seleccionados:</h3>
    <?php
    if (isset($_POST['prendas'])) {
    foreach ($_POST['prendas'] as $id_Prenda) {
        $descripcion = $_SESSION['prendas_seleccionadas'][$id_Prenda];
        $id_Precio = $_SESSION['prendas_seleccionadas'][$id_Prenda]['id_Precio'];

            $conexion=mysqli_connect("localhost","root","","tiendapabeso") or die("Problemas con la conexión");

        // Realiza la consulta para obtener el precio real
        $resultado = mysqli_query($conexion, "SELECT precio FROM precio WHERE id_Precio = $id_Precio");
        $fila = mysqli_fetch_assoc($resultado);
        $precio = $fila['precio'];

        echo "<div class='container'>";
        echo "<div class='row border-bottom'>";
        
        echo "<div class='col-sm'>";
        echo "<p><strong>ID Prenda:</strong>".$id_Prenda."</p>";
        echo "</div>";
        echo "<div class='col-sm'>";
        $descripcion = $_SESSION['prendas_seleccionadas'][$id_Prenda]['descripcion'];
        echo "<p><strong>Descripcion: </strong>".$descripcion."<br>";
        
        echo "</div>";
        echo "<div class='col-sm'>";
        echo "<p><strong>Descripcion:</strong> ".$precio."</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

      

   }
}

    ?>
    <input type="submit" class="btn btn-success btn-lg " value="Procesar Venta">

</div>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  

</body>
</html>

