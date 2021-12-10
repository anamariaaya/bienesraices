<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aya & Koch Bienes Raíces</title>

    <!--CSS-->
    <link rel="stylesheet" href="build/css/app.css">

</head>
<body>
    <header class="header <?php echo isset($inicio) ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="build/img/logo.svg" alt="logotipo Aya y Koch">
                </a>

                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="ícono menú responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="build/img/dark-mode.svg" alt="ícono dark mode">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    </nav>
                </div>
            </div>
            <?php echo isset($inicio) ? '<h1> Casas y pisos exlusivos de lujo</h1>' : ''; ?>
        </div>
    </header>  