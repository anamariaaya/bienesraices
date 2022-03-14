<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h2>Casas y Pisos en venta</h2>

        <?php
            include 'includes/templates/anuncios.php';
        ?>
        
    </main>

<?php
    incluirTemplate('footer');
?>