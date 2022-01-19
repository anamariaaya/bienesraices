<?php
//Importar la conexión a BBDD
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();

//Consultar

$query = "SELECT * FROM propiedades ORDER BY creado DESC LIMIT {$limite}";

//Obtener resultados
$resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)):?>
    <div class="anuncio">

        <img loading="lazy" src="/images/<?php echo $propiedad['imagen'] ?>" alt="anuncio">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo'] ?></h3>
            <p><?php echo $propiedad['descripcion'] ?></p>
            <p class="precio"><?php echo number_format($propiedad['precio'], 0, ',', '.') ?> &euro;</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" class="iconos-propiedades" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc'] ?></p>
                </li>
                <li>
                    <img loading="lazy" class="iconos-propiedades" src="build/img/icono_estacionamiento.svg" alt="icono parking">
                    <p><?php echo $propiedad['estacionamiento'] ?></p>
                </li>
                <li>
                    <img loading="lazy" class="iconos-propiedades" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones'] ?></p>
                </li>
            </ul>

            <a class="boton-amarillo-block" href="anuncio.php?id=<?php echo $propiedad['id']; ?>">Ver propiedad</a>

        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php
//Cerrar la conexión

?>