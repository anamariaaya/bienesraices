<?php

    //Importar la conexión
    require '../includes/config/database.php';    
    $db = conectarDB();

    //Escribir el query
    $query = "SELECT * FROM propiedades";

    //Consultar la BBDD
    $resultadoConsulta = mysqli_query($db, $query);

    // Muestra mensaje condicional de crear.php
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            //Eliminar el archivo (imagen)
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink('../images/' . $propiedad['imagen']);

            //Eliminar la propiedad
            $query = "DELETE FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);

            if($resultado){
                header('location: /admin?resultado=3');
            }
        }
    }

    //Trae el headder y lo incluye
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Aya & Koch - Bienes Raíces</h1>

        <!-- Agregamos un mensaje de éxito al crear la propiedad -->
        <?php if (intval($resultado)===1):?>
            <!-- <p class="alerta exito">Anuncio creado correctamente</p> -->
            <script> alert('Anuncio creado')</script>
            <?php elseif(intval($resultado)===2):?>
                <script> alert('Anuncio actualizado correctamente')</script>

            <?php elseif(intval($resultado)===3):?>
                <script> alert('Anuncio eliminado correctamente')</script>
        <?php endif; ?>

        <a href="/admin/propiedades/crear.php" class="boton-verde">Nueva propiedad</a>

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
            <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td> <?php echo $propiedad['id']; ?> </td>

                    <td> <?php echo $propiedad['titulo']; ?> </td>

                    <td><img class="imagen-tabla" src="/images/<?php echo $propiedad['imagen'];?>"></td>    
                        <!-- Muestra imagen genérica en caso de no encontrar imagen en la base de datos
                        <img class="imagen-tabla" src="/images/<?//php// if ($propiedad['imagen']){
                        //echo $propiedad['imagen'];
                    //}else{
                        //echo 'muestra.jpg';
                    //}
                    ?>"> -->

                    <td> <?php echo number_format($propiedad['precio'], 0, ',', '.') ;?>&euro;</td>

                    <td>
                        <!--Eliminar la propiedad-->
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id'];?> ">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a class="boton-amarillo-block" href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>

            </tbody>
        </table>


    </main>

<?php
    //Cerrar la conexión
    mysqli_close($db);

    //Trae el footer y lo incluye
    incluirTemplate('footer');
?>