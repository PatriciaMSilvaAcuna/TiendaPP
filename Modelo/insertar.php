<html>
<head>
<title>Insertar</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
</header>
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
<div class="text-center">
<b>      
<?php
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or die("Problemas con la conexión");

$dni = $_REQUEST['dni'];

// Primero, verifica si ya existe un usuario con el mismo DNI
$resultado = mysqli_query($conexion, "SELECT * FROM empleado WHERE dni='$dni'");

if(mysqli_num_rows($resultado) > 0){
    // Si el resultado es mayor que 0, significa que ya existe un usuario con ese DNI
    echo "<div class='alert alert-danger' role='alert'>Error: Ya existe un usuario con el DNI $dni.</div>";
} else {
    // Si no hay resultados, entonces puedes insertar el nuevo usuario
    $_registro = mysqli_query($conexion, "INSERT INTO empleado (dni,nombre,usuario,contrasena,estado,id_Tipo_de_usuario)
    values ('$dni','$_REQUEST[nombre]','$_REQUEST[usuario]','$_REQUEST[contrasena]','$_REQUEST[estado]',$_REQUEST[id_Tipo_de_usuario])");

    if($_registro){
        echo "<div class='alert alert-success' role='alert'>El empleado fue dado de alta.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: ".mysqli_error($conexion)."</div>";
    }
}

mysqli_close($conexion);
?>
</b>
<?php

    session_start();    
    if ($_SESSION['id_Tipo_de_usuario'] == 1) {
        echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>';
    } else {
        echo '<a href="accesoAceptadoVendedor.php" class="btn btn-secondary btn-lg ">Volver</a>';
    }
?>
       
<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>     
</body>
</html>