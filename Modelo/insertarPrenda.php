<!DOCTYPE html>
<html lang="es">
<head>
<title>Agregar Stock</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-Crean un pequeño script para cargar el CDN->
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

</head>
<body>

<header class="text-center bg-dark text-danger py-3">
        <h4 id="Bienvenida"> PaBeSo Tienda</h4>
</header>
    
</head>
 <form action="altas01.php" method="post">
             <br>
            <!-Creamos un select con conexión a la BD para cargar los TIPOS de prendas->

        
                <label>TIPO DE PRENDA</label>
            <select id="prenda" name="prenda">
            <?php
                $conexion = mysqli_connect("localhost", "root", "", "tiendapabeso") or die ("problemas con la conexion");

                    $registros = mysqli_query($conexion, "select id_Tipo_de_prenda, nombre from tipodeprenda") or die ("Problemas con el select: " . mysqli_error($conexion));
                    //asignamos al select un valor en cero antes de cargar el while.
                    echo "<option value=0>Seleccione un Tipo de prenda</options>";

                    while ($reg = mysqli_fetch_array($registros)) {

                        echo "<option value=\"$reg[id_Tipo_de_prenda]\">$reg[nombre]</options>";
                    } 
            ?>
                
            
            </select>
            <br> 
            <br>
            <!-Creamos el div que modificaremos para cargar el select de los ID de las prendas->
            <div id="descripcion"></div>
        

            <br>
            <br>
            
            <br>
            Cantidad:
            <input type="text" name="cantidad" id="cantidad">

            <input type="submit" class="btn btn-info btn-lg" value="Dar de Alta">



    </form>
        
</body>
</html>
<!-Creamos el script donde trabajaremos con AJAX->
<script type="text/javascript">
    //esta función inicia atomaticamente al cargarse la página.
    $(document).ready(function(){
        //Asignamos el valor 0 al select al iniciar la página.
        $('#prenda').val(0);
        //La funbción recargarLista() realiza una peticion en ajax
        recargarLista();
        //Esta función se va a ejecutar cada vez que el select marca sufra un cambio.
        $('#prenda').change(function(){
            // Y vuelve a ejecutar la función recargarLista;
            recargarLista();
        });
    })
</script>
<script type="text/javascript">
    function recargarLista(){
        // La función realiza una petición ajax mediante un post que trae al select "prendas".
        $.ajax({
            // El post manda los datos a datos.php
            type:"POST",
            url:"datos.php",
            // Se manda como idPrenda el contenido del select.
            data:"id_Tipo_de_prenda=" + $('#prenda').val(),
            // "r" es el que devuelve el contenido html de datos.php.
            success:function(r){
                // se carga "r" en el div descripcion
                $('#descripcion').html(r);
            }
        });
    }
</script>

 
<br>
<a href="accesoAceptadoAdmin.php" class="btn btn-secondary btn-lg ">Volver</a>
    
<br>
<br>
<br>
</div>
</div>
<footer class="text-center bg-dark text-white py-3 mt-auto fixed-bottom">
       <p>© 2023 PaBeSo Tienda. Todos los derechos reservados.</p>
</footer>     
</body>
</html>