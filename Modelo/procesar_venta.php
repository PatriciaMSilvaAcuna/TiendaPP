<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Procesamiento de compra</title>
</head>
<body>
	<?php
// Inicia la sesión al principio del script
if(session_status() == PHP_SESSION_NONE){
    // session has not started
    session_start();
}
// Accede a id_empleado
if(isset($_SESSION['id_empleado'])){
    $id_empleado = $_SESSION['id_empleado'];
} else {
    // Maneja el caso en que id_empleado no esté establecido en la sesión
    echo "id_empleado no está establecido en la sesión.";
    exit; // o redirige al usuario, maneja el error como prefieras
}


// Conexión a la base de datos
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or die("Problemas con la conexión");

// Recoge los datos del formulario
$id_empleado = $_SESSION['id_empleado']; // Asegúrate de que este valor se guarda en la sesión
$id_medio_de_pago = $_POST['medio_de_pago'];
$subtotal = $_POST['precio']; // Asegúrate de que este valor se envía en el formulario

// Prepara la consulta SQL
$sql = "INSERT INTO ventas (id_Empleado, fecha_Venta, id_Medio_de_pago, total) VALUES (?, NOW(), ?, ?)";

// Prepara la declaración
$stmt = mysqli_prepare($conexion, $sql);

// Vincula los parámetros
mysqli_stmt_bind_param($stmt, 'iid', $id_Empleado, $id_medio_de_pago, $subtotal);

// Ejecuta la declaración
if(mysqli_stmt_execute($stmt)){
    echo "Venta procesada correctamente.";
} else {
    echo "Error al procesar la venta: " . mysqli_error($conexion);
}

// Cierra la declaración y la conexión
mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
</body>
</html>