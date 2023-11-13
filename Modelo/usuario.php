<html>
<head>
<title>Tienda PaBeso</title>
</head>
<body>
<?php
$conexion=mysqli_connect("localhost","root","","tiendapabeso") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select *,
                        usuario, contrasena, id_Tipo_de_usuario from empleado where usuario ='$_REQUEST[usuario]' and contrasena = '$_REQUEST[contrasena]'") or
  die ("problemas en el select:".mysqli_error($conexion));
session_start();
if ($reg=mysqli_fetch_array($registros))
{

    if ($reg ['estado'] == 1){
            if ($reg['id_Tipo_de_usuario']==1){
                $_SESSION['usuario'];
                    header('location: ..\vista\accesoAceptadoAdmin.html');
                }
                else {
                    $_SESSION['usuario'];
                    header('location: ..\vista\accesoAceptadoVendedor.html');
                }
    }
    else {
        echo "No tiene permiso de acceso";
    }
    
  }

else
{
  echo "No existe usuario.";
}
mysqli_close($conexion);
?>
</body>
</html>