<?php

// Incluir el archivo de configuración de la base de datos
require_once __DIR__ . '/../../config/database.php';

class MovimientoModel {
    private PDO $db;

    public function __construct() {
        // Obtener la conexión a la base de datos
        $this->db = getDB();
    }

    // Obtener todos los movimientos
    public function getAllMovimientos(): array {
        $stmt = $this->db->query("SELECT * FROM movimientos ORDER BY fecha DESC");
        return $stmt->fetchAll();
    }

    // Agregar un nuevo movimiento
    public function addMovimiento(string $fecha, string $factura, string $descripcion, float $debe, float $haber): void {
        $saldoAnterior = $this->getLastSaldo();
        $saldo = $saldoAnterior + $debe - $haber;

        $stmt = $this->db->prepare("INSERT INTO movimientos (fecha, factura, descripcion, debe, haber, saldo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$fecha, $factura, $descripcion, $debe, $haber, $saldo]);
    }

    // Obtener el último saldo registrado
    private function getLastSaldo(): float {
        $stmt = $this->db->query("SELECT saldo FROM movimientos ORDER BY id DESC LIMIT 1");
        $result = $stmt->fetch();
        return $result ? (float)$result['saldo'] : 0.0;
    }
}