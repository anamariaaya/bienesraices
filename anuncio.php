<?php

    //Validar el Id del click
    $id = $_GET['id'];

    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /anuncios.php');
    }
     // Base de datos
     require 'includes/config/database.php';    
     $db = conectarDB();    

    //Consultar los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);

    if(!$resultado -> num_rows){
        header('Location: /anuncios.php');
    }


    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <a class="btn-volver" href="anuncios.php">< Volver a todos los anuncios</a>
        <h1><?php echo $propiedad['titulo']?></h1>

            <img loading="lazy" src="images/<?php echo $propiedad['imagen']?>">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo number_format($propiedad['precio'], 0, ',', '.')?> &euro;</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" class="iconos-propiedades" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']?></p>
                </li>
                <li>
                    <img loading="lazy" class="iconos-propiedades" src="build/img/icono_estacionamiento.svg" alt="icono parking">
                    <p><?php echo $propiedad['estacionamiento']?></p>
                </li>
                <li>
                    <img loading="lazy" class="iconos-propiedades" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones']?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion']?></p>
        </div>

    </main>

<?php
    mysqli_close($db);

    incluirTemplate('footer');
?>