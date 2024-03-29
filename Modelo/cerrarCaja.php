<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Apertura de Caja</title>
	<link rel="stylesheet" type="text/css" href="./css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="vh-100 text-center">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
</header>

<?php
session_start();
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or die("Problemas con la conexión");

$nombreUsuario = $_SESSION['usuario'];
// Obtengo el id_Empleado basándote en el nombre del usuario
$resultado = mysqli_query($conexion, "SELECT id_Empleado FROM empleado WHERE usuario = '$nombreUsuario'");
$fila = mysqli_fetch_assoc($resultado);
$idEmpleado = $fila['id_Empleado'];

$montoFinal = $_POST['montoFinal'];
$resultado = mysqli_query($conexion, "SELECT MAX(id_Caja) AS id_Caja FROM caja");
$fila = mysqli_fetch_assoc($resultado);
$id_Caja = $fila['id_Caja'];

// Verifica si la caja ya ha sido cerrada
$verificar = mysqli_query($conexion, "SELECT * FROM caja WHERE id_Caja = '$id_Caja' AND fecha_Cierre IS NOT NULL");
if(mysqli_num_rows($verificar) > 0){
    echo "<p id='mensaje'>La caja numero $id_Caja ya ha sido cerrada.</p>";
} else {
    $fechaCierre = date('Y-m-d');
    $consulta = "UPDATE caja SET monto_Final = '$montoFinal', fecha_Cierre = '$fechaCierre' WHERE id_Caja = '$id_Caja'";
    if(mysqli_query($conexion, $consulta)){
        echo "<p id='mensaje'>$nombreUsuario cerró  caja numero $id_Caja, con $ $montoFinal</p>";
    } else {
        echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
    }
}

mysqli_close($conexion)

?>
<div class="mt-auto">
               

<?php

   
    if ($_SESSION['id_Tipo_de_usuario'] == 1) {
        echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>';
    } else {
        echo '<a href="accesoAceptadoVendedor.php" class="btn btn-secondary btn-lg ">Volver</a>';
    }
?>
</div>    

<br>
<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>   
  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

</body>
</html>