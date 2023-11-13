<html>
<head>
<title>Buscar</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
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
<?php
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or
die("Problemas con la conexión");

$id_empleado = $_REQUEST['id_Empleado'];

mysqli_query($conexion, "UPDATE empleado SET estado=false
  WHERE id_Empleado = $_REQUEST[id_Empleado]") or die
("Problemas en el select".mysqli_error($conexion));

mysqli_close($conexion);
echo "El empleado fue dado de baja.";

?>

       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>     
</body>
</html>