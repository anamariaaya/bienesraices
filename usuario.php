<?php
// Importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

//Crear un email y password
$email = "andy@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

//Query para crear el Usuario
$query = " INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}');";

// echo $query;

//Agregar a la Base de Datos
mysqli_query($db, $query);
?>