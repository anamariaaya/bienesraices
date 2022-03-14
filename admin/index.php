<?php
    //Sesión del usuario
    require '../includes/app.php';
    estaAutenticado();

    //Importar las clases
    use App\Propiedad;
    use App\Vendedor;

    //Implementar un método para obtener todas las propiedades usando Active Record
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

   // Muestra mensaje condicional de crear.php
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        //Validar ID
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            $tipo = $_POST['tipo'];

            if(validarTipoContenido($tipo)){
                //Compara lo que vamos a eliminar
                if($tipo === 'vendedor'){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                } else if($tipo === 'propiedad'){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }

            }            
        }
    }

    //Trae el header y lo incluye
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Aya & Koch - Bienes Raíces</h1>

        <!-- Agregamos un mensaje de éxito al crear la propiedad -->
        <?php
            $mensaje = mostrarNotificacion( intval($resultado));
            if($mensaje){ ?>
                <p class="alerta exito"><?php echo s($mensaje)  ?></p>        
        <?php }?>      

        <a href="/admin/propiedades/crear.php" class="boton-verde">Nueva propiedad</a>
        <a href="/admin/vendedores/crear.php" class="boton-verde">Nuevo Vendedor</a>


        <h2>Propiedades</h2>
        <!--Tabla para listar las propiedaddes-->
        <table class="propiedades">
            <thead>
                <th>Id</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </thead>

            <tbody> <!--Mostrar los resultados-->
                <?php foreach( $propiedades as $propiedad): ?>
                <tr>
                    <td> <?php echo $propiedad->id; ?> </td>

                    <td> <?php echo $propiedad->titulo; ?> </td>

                    <td><img class="imagen-tabla" src="/images/<?php echo $propiedad->imagen;?>"></td>    

                    <td> <?php echo number_format($propiedad-> precio, 0, ',', '.') ;?>&euro;</td>

                    <td>
                        <!--Eliminar la propiedad-->
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id;?> ">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a class="boton-amarillo-block" href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <h2>Vendedores</h2>
        <!--Tabla para listar los vendedores-->
        <table class="propiedades">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </thead>

            <tbody> <!--Mostrar los resultados-->
                <?php foreach( $vendedores as $vendedor): ?>
                <tr>
                    <td> <?php echo $vendedor->id; ?> </td>

                    <td> <?php echo $vendedor->nombre ." ". $vendedor->apellido; ?> </td> 

                    <td> <?php echo $vendedor-> telefono;?></td>

                    <td>
                        <!--Eliminar la vendedor-->
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id;?> ">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a class="boton-amarillo-block" href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>


    </main>

<?php
    //Cerrar la conexión
    mysqli_close($db);

    //Trae el footer y lo incluye
    incluirTemplate('footer');
?>