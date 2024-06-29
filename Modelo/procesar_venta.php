<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento de compra</title>
<link rel="stylesheet" type="text/css" href="./css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
<div class="card w-50 h-75 m-auto">
    <?php
// Inicia la sesión al principio del script
if(session_status() == PHP_SESSION_NONE){
    // session has not started
    session_start();
}
// Accede a id_empleado
if(isset($_SESSION['id_Empleado'])){
    $id_Empleado = $_SESSION['id_Empleado'];
} else {
    // Maneja el caso en que id_empleado no esté establecido en la sesión
    echo "id_empleado no está establecido en la sesión.";
    exit; // o redirige al usuario, maneja el error como prefieras
}


// Conexión a la base de datos
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or die("Problemas con la conexión");

// Recoge los datos del formulario
$id_Empleado = $_SESSION['id_Empleado']; 
$id_Medio_de_pago = $_POST['medio_de_pago'];
$subtotal = $_POST['precio']; 

// Prepara la consulta SQL
$sql = "INSERT INTO ventas (id_Empleado, fecha_Venta, id_Medio_de_pago, total) VALUES (?, NOW(), ?, ?)";

// Prepara la declaración
$stmt = mysqli_prepare($conexion, $sql);

// Vincula los parámetros
mysqli_stmt_bind_param($stmt, 'iid', $id_Empleado, $id_Medio_de_pago, $subtotal);

echo '<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">';
// Ejecuta la declaración
if(mysqli_stmt_execute($stmt)){
    echo '<div class="alert alert-success" role="alert">Venta procesada correctamente.</div>';

    // Determina la columna a actualizar en base al medio de pago
    $columna = '';
    switch ($id_Medio_de_pago) {
        case 1: // Asume que 1 es efectivo
            $columna = 'ventas_efectivo';
            break;
        case 2: // Asume que 2 es débito
            $columna = 'ventas_debito';
            break;
        case 3: // Asume que 3 es crédito
            $columna = 'ventas_credito';
            break;
    }

    // Prepara la consulta SQL para actualizar la caja
    $stmt = "UPDATE caja SET $columna = $columna + ? WHERE id_Caja = ?";

    // Prepara la declaración
    $stmt = mysqli_prepare($conexion, $sql);

    // Vincula los parámetros
    mysqli_stmt_bind_param($stmt, 'di', $subtotal, $id_Empleado);

    // Ejecuta la declaración
    if(mysqli_stmt_execute($stmt)){
        
        echo '<div class="alert alert-success" role="alert">Caja actualizada correctamente.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al actualizar la caja: '  . mysqli_error($conexion).'</div>';
    }

} else {
    echo '<div class="alert alert-danger" role="alert">Error al procesar la venta: '  . mysqli_error($conexion).'</div>';
}


// Cierra la declaración y la conexión
mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
<br>
<div class="d-flex justify-content-center align-items-center" style="height: 100vh">
<?php
    
    if ($_SESSION['id_Tipo_de_usuario'] == 1) {
        echo '<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>';
    } else {
        echo '<a href="accesoAceptadoVendedor.php" class="btn btn-secondary btn-lg ">Volver</a>';
    }
?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>