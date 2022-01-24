<?php
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aya & Koch Bienes Raíces</title>

    <!--CSS-->
    <link rel="stylesheet" href="/build/css/app.css">

</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="logotipo Aya y Koch">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="ícono menú responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="ícono dark mode">
                    <nav class="navegacion">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncios</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <div class="submenu"><?php echo $_SESSION['usuario'];?>&ShortDownArrow;</a>
                            <div class="dropdown">
                                <a href="/admin/" class="admin">Admin</a>
                                <a href="/cerrar-sesion.php">Cerrar Sesión</a>                                
                            </div>
                            <?php endif; ?>
                        <?php if(!$auth):?>
                            <a href="login.php">Log in</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <?php echo $inicio ? '<h1> Casas y pisos exlusivos de lujo</h1>' : ''; ?>
        </div>
    </header>  