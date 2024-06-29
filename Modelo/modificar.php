<html>
<head>
<title>Modificar Usuario</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100">
<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
<html>

</header>
<div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
<div class="text-center"> 
<br><br><br><br><br><br>
<span>     
<?php
$conexion = mysqli_connect("localhost", "root", "", "tiendapabeso") or die("Problemas con la conexión");

$dni = $_REQUEST['dni'];
// Consulta los datos del empleado
$resultado = mysqli_query($conexion, "SELECT e.dni, e.nombre, e.usuario, e.contrasena, e.estado, i.nombre from empleado as e join tipodeusuario as i on  e.id_Tipo_de_usuario = i.id_Tipo_de_usuario where dni = $dni");

if ($resultado) {
    $empleado = mysqli_fetch_assoc($resultado);
    if ($empleado) {

        // Mostrar los datos del empleado
        echo "Nombre: " . $empleado['nombre'] . "<br>";
        echo "Usuario: " . $empleado['usuario'] . "<br>";
        echo "Contraseña: " . $empleado['contrasena'] . "<br>";
        echo "Estado: " . $empleado['estado'] . "<br>";
        echo "DNI: " . $empleado['dni'] . "<br>";
        echo "Estado: " . $empleado['estado'] . "<br>";
        echo "Usuario: " . $empleado['tipoUsuario'] . "<br>";
}
else{

echo "<div class='alert alert-warning' role='alert'>No se encontró ningún empleado con el DNI proporcionado.</div>";

}
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   //  Recibe los datos del formulario de edición
   $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $estado = $_POST['estado'];
    $tipoUsuario = $_POST['tipoUsuario'];

    // Actualiza los datos en la base de datos
   $update = mysqli_query($conexion, "UPDATE empleado SET nombre = '$nombre', usuario = '$usuario', contrasena = '$contrasena', estado = '$estado', id_Tipo_de_usuario = '$tipoUsuario' WHERE dni = $dni");

    if ($update) {
        echo "<div class='alert alert-success' role='alert'>Empleado actualizado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error al actualizar al empleado: " . mysqli_error($conexion) . "</div>"; }
} else {
    
  //   Consulta los datos del empleado
    $resultado = mysqli_query($conexion, "SELECT * FROM empleado WHERE dni = $dni");

    if ($resultado) {
        $empleado = mysqli_fetch_assoc($resultado);
        if (!$empleado) {
            echo "<div class='alert alert-warning' role='alert'>No se encontró ningún empleado con el DNI proporcionado.</div>";
       } else {
        // Muestra los datos en un formulario para editar
            echo "<form method='post'>";
            echo "<input type='text' name='nombre' value='" . $empleado['nombre'] . "'>";
            echo "<input type='text' name='usuario' value='" . $empleado['usuario'] . "'>";
            // Agrega otros campos según tus necesidades
            echo "<button type='submit' class='btn btn-primary'>Guardar cambios</button>";
            echo "</form>";
        }
    } else {
      echo "<div class='alert alert-danger' role='alert'>Error al consultar los datos del empleado: " . mysqli_error($conexion) . "</div>";
    }
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