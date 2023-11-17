<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Consulta de Precio </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
    <body class="vh-100">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
</header>
	
	<div>
		
	<h3 class="d-flex justify-content-center align-items-center pt-3 pr-2 pb-3 pl-2"> Consulta de Precio </h3>

	<div class="d-flex justify-content-center align-items-center vh-100">
<form action="../Modelo/pagina3.php" method="post">
Ingrese ID de la prenda a consultar:
<input type="text" name="id_Prenda" placeholder=" Ingrese Id de Prenda">
<br>
<br>
<div>
<br>
<input type="submit" class="btn btn-info btn-lg" value="Buscar">
</form>
<br>
<br>
<br><br><br>
    </div>
<?php
    session_start();
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