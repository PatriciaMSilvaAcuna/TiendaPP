<html>
<head>
<title>Actualizar</title>
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

 mysqli_query($conexion, "UPDATE empleado SET estado='$_REQUEST[estado_actual]' WHERE estado ='$_REQUEST[estado_viejo]'") or die(" Problemas con la conexión");
    ("Problemas en el update".mysqli_error($conexion));
    echo "El estado del empleado ha sido actualizado exitosamente.";


mysqli_close($conexion);
?>
</div>
</div>
<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>     
</body>
</html>
