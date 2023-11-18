<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or
die("Problemas con la conexión");

if (isset($_POST['prendas'])) {
    $prendas = $_POST['prendas'];
    foreach ($prendas as $id_Prenda) {
        $id_Prenda = mysqli_real_escape_string($conexion, $id_Prenda);
        $registro=mysqli_query($conexion, "SELECT id_Prenda, descripcion, stock FROM prendas WHERE id_Prenda = '$id_Prenda'")
        or die(" Problemas con la conexión".mysqli_error($conexion));

        if($reg=mysqli_fetch_array($registro)) {
            if ($reg['stock'] > 0) {
                // Procesar la venta
                mysqli_query($conexion, "UPDATE prendas SET stock = stock - 1 WHERE id_Prenda = '$id_Prenda'")
                or die(" Problemas con la conexión".mysqli_error($conexion));
                echo "Venta procesada para la prenda: ".$reg['descripcion']."<br>";
            } else {
                echo "La prenda ".$reg['descripcion']." no tiene stock disponible.<br>";
            }
        }
    }
} else {
    echo "No se seleccionó ninguna prenda.";
}

mysqli_close($conexion);
?>	
</body>
</html>