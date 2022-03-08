<?php
    require '../../includes/app.php';
    estaAutenticado();

    if(!$auth){
        header('Location: /');
    }
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Borrar</h1>
    </main>

<?php
    incluirTemplate('footer');
?>