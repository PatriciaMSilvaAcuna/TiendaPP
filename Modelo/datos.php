<?php 
//Abrimos la conexion.
$conexion=mysqli_connect('localhost','root','','tiendapabeso');
//creamos una variable $idMarca para recuperar el post.
$id_Tipo_de_prenda=$_POST['id_Tipo_de_prenda'];
	//sql que trae los datos para cargar el select.
	$sql= "SELECT id_Tipo_de_prenda, nombre FROM ";
		//ejecuta la consulta
	$result=mysqli_query($conexion,$sql);
	//Graba en la variable $cadena el inicio del select modelo.
	$cadena="<label>Prenda</label> 
			<select id='prenda' name='Prenda'>";

	while ($ver=mysqli_fetch_row($result)) {
		//cargo lo que ya tengo en $cadena mas los datos del select. Primero el id y despues el nombre.
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}
	//imprimo todo lo que hay en $cadena mas el cierre del select.
	echo  $cadena."</select>";
	

?>

