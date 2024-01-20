<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acceso Administrador</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="vh-100 text-center">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
</header>

<br>
<br>
<br>

<button class="btn btn-primary btn-lg" onclick="abrirCaja()">Apertura de Caja</button>

<button class="btn btn-success btn-lg" onclick="venta()">Venta</button>

<button class="btn btn-info btn-lg" onclick="consultaPrecio()">Consulta Precio</button>



<button class="btn btn-primary btn-lg" onclick="window.location.href='http://localhost/Tienda/Modelo/listarVentas.php'">Listar Ventas</button>

<button class="btn btn-success btn-lg" onclick="AdministracionEmpleados()">Administracion Empleados</button>

<button class="btn btn-primary btn-lg" onclick="cerrarCaja()">Cierre de Caja</button>
<br>
<br>
<button class="btn btn-primary btn-lg" onclick="window.location.href='http://localhost/Tienda/Modelo/agregarPrendas.php'">Agregar Prendas</button>
<button class="btn btn-info btn-lg" onclick="window.location.href='http://localhost/Tienda/Modelo/consultaStock.php'">Consulta Stock</button>

<br>

<br>
<br>

<div>
<button class="btn btn-secondary btn-lg" onclick="salir()">Salir</button>

</div>
<script>

function cerrarCaja(){
	window.location.href="../Modelo/cajaCierre.php";
	}
function abrirCaja() {
	window.location.href ="../Modelo/caja.php";
}	
function venta() {
	window.location.href ="http://localhost/Tienda/Modelo/venta.php";
 
}

function consultaPrecio() {
  window.location.href ="../Modelo/consultaPrecio.php";
}
function salir() {
	window.location.href = "../index.html";

}


function AdministracionEmpleados() {
  window.location.href ="../Vista/AdministracionEmpleados.html";
}

  

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="d-flex justify-content-center align-items-center mb-4" style="background-color: rgba(0,0,0,0.5);">
<b>
<?php
session_start();
if(isset($_SESSION['usuario'])){
    echo " Está trabajando ". $_SESSION['usuario'];
} else {
    echo " Error: No se pudo obtener el nombre del usuario.";
}
?>  
</b>
</div>

<br>
<br>

<footer class="text-center bg-dark text-white py-3 fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>	
</body>
</html>



