<html>
<head>
<title>Dar de Baja Usuario</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
<html>

</header>
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
<div class="text-center">      
<?php
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or die("Problemas con la conexión");

$dni = $_REQUEST['dni'];

if(is_numeric($dni)){
    // Primero, obtenemos los datos del empleado
    $resultado = mysqli_query($conexion, "SELECT * FROM empleado WHERE dni = $dni");

    if($resultado){
        $empleado = mysqli_fetch_assoc($resultado);
        if($empleado){
            echo "<div class='alert alert-info' role='alert'>";
            echo "Nombre: " . $empleado['nombre'] . "<br>";
            echo "Usuario: " . $empleado['usuario'] . "<br>";
            
            echo "</div>";

            // Luego, preguntamos al usuario si desea continuar con la actualización
            echo "¿Estás seguro de que quieres dar de baja a este empleado? <br>";
            echo "<a href='confirmar_baja.php?dni=$dni' class='btn btn-danger'>Confirmar</a>";
            echo "<a href='../Vista/AdministracionEmpleados.html' class='btn btn-success'>Cancelar</a>";
        } else {
            echo "<div class='alert alert-warning' role='alert'>No se encontró ningún empleado con el ID proporcionado.</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: ".mysqli_error($conexion)."</div>";
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>Error: Se esperaba un valor numérico para id_Empleado.</div>";
}
?>

<br>
<br>
<a href="../Vista/AdministracionEmpleados.html" class="btn btn-secondary btn-lg ">Volver</a>        

<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>     
</body>
</html>