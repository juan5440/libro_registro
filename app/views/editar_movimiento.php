<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Movimiento</title>
    <!-- Bootstrap CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Movimiento</h1>
        <form action="index.php?action=edit" method="POST">
            <input type="hidden" name="id" value="<?= $movimiento['id'] ?>">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?= $movimiento['fecha'] ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="factura">Factura</label>
                    <input type="text" class="form-control" id="factura" name="factura" value="<?= $movimiento['factura'] ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $movimiento['descripcion'] ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="debe">Debe</label>
                    <input type="number" step="0.01" class="form-control" id="debe" name="debe" value="<?= $movimiento['debe'] ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="haber">Haber</label>
                    <input type="number" step="0.01" class="form-control" id="haber" name="haber" value="<?= $movimiento['haber'] ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>