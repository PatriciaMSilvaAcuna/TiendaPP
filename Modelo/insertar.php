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
mysqli_query($conexion, "insert into empleado(dni,nombre,usuario,contrasena,estado,id_Tipo_de_usuario)
values ('$_REQUEST[dni]','$_REQUEST[nombre]','$_REQUEST[usuario]','$_REQUEST[contrasena]','$_REQUEST[estado]',$_REQUEST[id_Tipo_de_usuario])") or die
("Problemas en el select".mysqli_error($conexion));
mysqli_close($conexion);
echo "El empleado fue dado de alta.";
?>
<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>     
</body>
</html>