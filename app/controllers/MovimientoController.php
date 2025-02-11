<?php

require_once __DIR__ . '/../models/MovimientoModel.php';

class MovimientoController {
    private MovimientoModel $model;

    public function __construct() {
        $this->model = new MovimientoModel();
    }

    // Mostrar la vista principal con los movimientos
    public function index(): void {
        $movimientos = $this->model->getAllMovimientos();
        require_once __DIR__ . '/../views/movimientos.php';
    }

    // Agregar un nuevo movimiento
    public function add(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fecha = $_POST['fecha'];
            $factura = $_POST['factura'];
            $descripcion = $_POST['descripcion'];
            $debe = (float)$_POST['debe'];
            $haber = (float)$_POST['haber'];

            $this->model->addMovimiento($fecha, $factura, $descripcion, $debe, $haber);
            header('Location: index.php');
            exit;
        }
    }


    // Editar un movimiento
    public function edit(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_POST['id'];
            $fecha = $_POST['fecha'];
            $factura = $_POST['factura'];
            $descripcion = $_POST['descripcion'];
            $debe = (float)$_POST['debe'];
            $haber = (float)$_POST['haber'];

            $this->model->updateMovimiento($id, $fecha, $factura, $descripcion, $debe, $haber);
            header('Location: index.php');
            exit;
        }

        // Mostrar el formulario de edición
        $id = (int)$_GET['id'];
        $movimiento = $this->model->getMovimientoById($id);
        if (!$movimiento) {
            header('Location: index.php');
            exit;
        }

        require_once __DIR__ . '/../views/editar_movimiento.php';
    }

    // Eliminar un movimiento
    public function delete(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int)$_GET['id'];
            $this->model->deleteMovimiento($id);
        }
        header('Location: index.php');
        exit;
    }

}