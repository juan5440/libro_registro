<?php

// Configuración de la base de datos
define('DB_HOST', 'localhost'); // Host de la base de datos
define('DB_USER', 'root');      // Usuario de MySQL
define('DB_PASS', '');          // Contraseña de MySQL (vacía por defecto en XAMPP)
define('DB_NAME', 'registro_movimientos'); // Nombre de la base de datos

// Función para obtener la conexión a la base de datos
function getDB(): PDO {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    return new PDO($dsn, DB_USER, DB_PASS, $options);
}