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
<div class="card w-25 h-75 m-auto"> 
        <div class="card-header bg-success text-white text-center">
             <h4> Apertura de Caja</h4>
    </div>
    <div class="card-body">
             <form action="http://localhost/Tienda/Modelo/abrirCaja.php" method="post">  
             <div class="form-group">
            <h5 class="card-title">Ingrese Monto de Apertura:</h5>
                        
                <input type="text" name="montoInicio" placeholder=" Ingrese: $10000 " class="form-control border border-5">
        
    <br>
    
    <br>
    <div class="d-flex justify-content-center w-100">
       <input type="submit" value="Abrir Caja" class="btn btn-primary btn-lg d-grid w-100">
        
    </div>
    
    
   </form>  
</div>
</form>
</div>
<div class="card-footer ">


	
    <div class="mt-auto">
<?php
    session_start();
    if ($_SESSION['id_Tipo_de_usuario'] == 1) {
        echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg d-grid">Volver</a>';
    } else {
        echo '<a href="accesoAceptadoVendedor.php" class="btn btn-secondary btn-lg d-grid">Volver</a>';
    }
?>
    </div> 
</div>  
<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>   
  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

</body>
</html>