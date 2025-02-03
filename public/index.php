<?php

require_once __DIR__ . '/../app/controllers/MovimientoController.php';

// Obtener la acción desde la URL
$action = $_GET['action'] ?? 'index';

// Crear una instancia del controlador
$controller = new MovimientoController();

// Ejecutar la acción correspondiente
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Acción no válida";
}