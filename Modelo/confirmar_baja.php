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

    // consulto el estado actual del usuario mediante consulta a la base
$consulta_estado = mysqli_query($conexion, "SELECT estado FROM empleado WHERE dni = $dni");


if ($consulta_estado){

         $empleado_estado = mysqli_fetch_assoc($consulta_estado);


	if($empleado_estado['estado']== 0) {

	 echo "<div class='alert alert-warning' role='alert'>El usuario ya se encuentra dado de baja.</div>";
} else {
    // Actualizar el estado del empleado a 0 (dado de baja)

    $update = mysqli_query($conexion, "UPDATE empleado SET estado = 0 WHERE dni = $dni");

if ($update) {

    echo "<div class='alert alert-success' role='alert'>Empleado dado de baja correctamente.</div>";
} else {
    echo "<div class='alert alert-danger' role='alert'>Error al dar de baja al empleado: " . mysqli_error($conexion) . "</div>";
    } 
  }

}else{

	 echo "<div class='alert alert-danger' role='alert'>Error al consultar el estado del empleado.</div>";
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