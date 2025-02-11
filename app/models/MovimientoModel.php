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

        $stmt = $this->db->query("SELECT * FROM movimientos ORDER BY fecha ASC");

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


    // Obtener un movimiento por ID
    public function getMovimientoById(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM movimientos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    // Actualizar un movimiento
    public function updateMovimiento(int $id, string $fecha, string $factura, string $descripcion, float $debe, float $haber): void {
        // Obtener el movimiento actual
        $movimientoActual = $this->getMovimientoById($id);
        if (!$movimientoActual) {
            throw new Exception("Movimiento no encontrado");
        }

        // Verificar si los valores de Debe o Haber han cambiado
        $debeCambiado = ($debe != $movimientoActual['debe']);
        $haberCambiado = ($haber != $movimientoActual['haber']);

        // Si no hay cambios en Debe o Haber, actualizar solo los otros campos
        if (!$debeCambiado && !$haberCambiado) {
            $stmt = $this->db->prepare("UPDATE movimientos SET fecha = ?, factura = ?, descripcion = ? WHERE id = ?");
            $stmt->execute([$fecha, $factura, $descripcion, $id]);
            return;
        }

        // Obtener el saldo anterior al movimiento que se está editando
        $saldoAnterior = $this->getSaldoAnterior($id);

        // Calcular el nuevo saldo para el movimiento editado
        $nuevoSaldo = $saldoAnterior + $debe - $haber;

        // Actualizar el movimiento editado
        $stmt = $this->db->prepare("UPDATE movimientos SET fecha = ?, factura = ?, descripcion = ?, debe = ?, haber = ?, saldo = ? WHERE id = ?");
        $stmt->execute([$fecha, $factura, $descripcion, $debe, $haber, $nuevoSaldo, $id]);

        // Recalcular el saldo para los movimientos posteriores
        $this->recalcularSaldosPosteriores($id);
    }

    // Eliminar un movimiento
    public function deleteMovimiento(int $id): void {
        $stmt = $this->db->prepare("DELETE FROM movimientos WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Obtener el saldo anterior al movimiento con el ID dado
    private function getSaldoAnterior(int $id): float {
        $stmt = $this->db->prepare("SELECT saldo FROM movimientos WHERE id < ? ORDER BY id DESC LIMIT 1");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result ? (float)$result['saldo'] : 0.0;
    }

    // Recalcular los saldos para los movimientos posteriores al movimiento con el ID dado
    private function recalcularSaldosPosteriores(int $id): void {
        // Obtener todos los movimientos posteriores al movimiento editado
        $stmt = $this->db->prepare("SELECT * FROM movimientos WHERE id > ? ORDER BY id ASC");
        $stmt->execute([$id]);
        $movimientosPosteriores = $stmt->fetchAll();

        // Obtener el saldo del movimiento editado
        $movimientoEditado = $this->getMovimientoById($id);
        $saldoActual = $movimientoEditado['saldo'];

        // Recalcular el saldo para cada movimiento posterior
        foreach ($movimientosPosteriores as $movimiento) {
            $saldoActual += $movimiento['debe'] - $movimiento['haber'];
            $stmt = $this->db->prepare("UPDATE movimientos SET saldo = ? WHERE id = ?");
            $stmt->execute([$saldoActual, $movimiento['id']]);
        }
    }


    // Obtener el último saldo registrado
    private function getLastSaldo(): float {
        $stmt = $this->db->query("SELECT saldo FROM movimientos ORDER BY id DESC LIMIT 1");
        $result = $stmt->fetch();
        return $result ? (float)$result['saldo'] : 0.0;
    }
}