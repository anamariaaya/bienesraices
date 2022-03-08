<?php

function conectarDB(): mysqli{
    $db = new mysqli('localhost', 'root', 'root', 'bienes_raices');
    mysqli_set_charset($db, 'utf8');

    if(!$db){
        echo "Error, no se pudo conectar";
        exit;
    }

    return $db;
}