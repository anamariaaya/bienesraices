<?php
    require '../../includes/app.php';
    estaAutenticado();
    
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;


    $propiedad = new Propiedad;

    //Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    //Arreglo con mensajes de error
    $errores = Propiedad::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        /*Crea una nueva Instancia*/
        $propiedad = new Propiedad($_POST['propiedad']);

        /* SUBIDA DE ARCHIVOS */
        //Crear carpeta
        $carpetaImagenes = '../../images/';
        
        //Generar un nombre único
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        //Realiza un resize a la imagen con Intervention
        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        $errores = $propiedad->validar();

        if(empty($errores)){

            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }

            //Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES.$nombreImagen);

            //Guarda en la base de datos
            $propiedad->guardar();

        }    
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear propiedad</h1>

        <a href="/admin" class="boton-verde">Volver al admin</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton-amarillo">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>