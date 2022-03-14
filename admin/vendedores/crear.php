<?php

require '../../includes/app.php';
use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    //crear nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);

    //validar
    $errores = $vendedor->validar();

    if(empty($errores)){
        $vendedor->guardar();
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
        <h1>Crear Vendedor</h1>

        <a href="/admin" class="boton-verde">Volver al admin</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/vendedores/crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Crear Vendedor" class="boton-amarillo">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>