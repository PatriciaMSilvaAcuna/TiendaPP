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

	
<div class="d-flex justify-content-center align-items-center flex-grow-1 mb-5">
        <form method="post" action="pagina2.php">

            <div class="form-group">
                <label>Ingrese un número:</label>
                <input type="text" name="numero1" class="form-control">
            </div>
            <div class="form-group">
                <label>Ingrese otro número:</label>
                <input type="text" name="numero2" class="form-control">
            </div>
            <br>
            <input type="submit" value="Confirmar" class="btn btn-primary">
        </form>
    </div>
    <div class="mt-auto">
        <a href="../Vista/accesoAceptadoVendedor.html" class="btn btn-secondary btn-lg float-right ">Volver</a>
    </div>    

    <br>
  <footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
  </footer>   
  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

</body>
</html>