<?php
    use App\Propiedad;
    use App\Vendedor;

    use Intervention\Image\ImageManagerStatic as Image;

    require '../../includes/app.php';
    estaAutenticado();

  
    //Traemos el id de la propiedad a la que hicimos click
    $id = $_GET['id'];
    //Validar la URL por ID válido
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    //Consultar los datos de la propiedad
    $propiedad = Propiedad::find($id);

    //Consultar para obtener los vendedores
    $vendedores = Vendedor::all();


    $errores = Propiedad::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Asignar los atributos
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);
        
        //Validación
        $errores = $propiedad->validar();

        //Subida de archivos
         //Generar un nombre único
         $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

         //Realiza un resize a la imagen con Intervention
         if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
         }
        
        
        if(empty($errores)){
            //Revisar que el arreglo de errores esté vacío
            if($_FILES['propiedad']['tmp_name']['imagen']){
               
                $image->save(CARPETA_IMAGENES . $nombreImagen);               
            }            
            //Almacenar la imagen
            $propiedad->guardar();
        }    
    }

    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        <a href="/admin" class="boton-verde">Volver al admin</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'?>

            <input type="submit" value="Actualizar Propiedad" class="boton-amarillo">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>