<?php

require '../../includes/app.php';
use App\Vendedor;

estaAutenticado();

$id = $_GET['id'];
//Validar la URL por ID válido
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /admin');
}

$vendedor = Vendedor::find($id);

$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $args = $_POST['vendedor'];
    

    //Sincronizar obj en memoria con lo que escribe el usuario
    $vendedor->sincronizar($args);
    
    //Validación
    $errores = $vendedor->validar();

    if(empty($errores)){
        $vendedor->guardar();        
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
        <h1>Actualizar Vendedor</h1>

        <a href="/admin" class="boton-verde">Volver al admin</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST">
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Guardar Cambios" class="boton-amarillo">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>