<?php

define('TEMPLATES_URL', __DIR__. '/templates');
define('FUNCIONES_URL', __DIR__. 'funciones.php');
define('CARPETA_IMAGENES', __DIR__.'/../images/');

function incluirTemplate( string $nombre, bool $inicio = false ){
    include TEMPLATES_URL."/${nombre}.php";
}

function estaAutenticado(): bool {
    session_start();

    if(!$_SESSION['login']){
        header('Location: /');
    }
    return true;
}

function debugging($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapa/Sanitiza el HTML
function s($html) : string{
    $s = htmlspecialchars($html);
    return $s;
}