<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Movimientos</title>
    <!-- Bootstrap CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="../public/css/dataTables.bootstrap4.min.css">
    <!-- Buttons CSS -->

    <link rel="stylesheet" type="text/css" href="../public/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="../public/css/buttons.bootstrap4.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/all.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Registro de Movimientos</h1>
        <form action="index.php?action=add" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="factura">Factura</label>
                    <input type="text" class="form-control" id="factura" name="factura" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="debe">Debe</label>
                    <input type="number" step="0.01" class="form-control" id="debe" name="debe" value="0">
                </div>
                <div class="form-group col-md-2">
                    <label for="haber">Haber</label>
                    <input type="number" step="0.01" class="form-control" id="haber" name="haber" value="0">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Movimiento</button>
        </form>
        <br>
        <!-- Filtro por rango de fechas -->
        <div class="date-range-filter col-md-9">
            <label for="fechaInicio">Fecha Inicio:</label>
            <input type="date" id="fechaInicio" class="form-control">
            <label for="fechaFin">Fecha Fin:</label>
            <input type="date" id="fechaFin" class="form-control">

            <div><button id="filtrarFecha" class="btn btn-secondary">Filtrar</button></div>

        </div>

        <table id="movimientosTable" class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Factura</th>
                    <th>Descripción</th>
                    <th>Debe</th>
                    <th>Haber</th>
                    <th>Saldo</th>

                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($movimientos as $movimiento): ?>
                <tr>
                    <td><?= htmlspecialchars($movimiento['fecha']) ?></td>
                    <td><?= htmlspecialchars($movimiento['factura']) ?></td>
                    <td><?= htmlspecialchars($movimiento['descripcion']) ?></td>
                    <td><?= number_format($movimiento['debe'], 2) ?></td>
                    <td><?= number_format($movimiento['haber'], 2) ?></td>
                    <td><?= number_format($movimiento['saldo'], 2) ?></td>

                    <td>
                        <a href="index.php?action=edit&id=<?= $movimiento['id'] ?>"
                            class="btn btn-warning btn-sm">Editar</a>
                        <a href="index.php?action=delete&id=<?= $movimiento['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Estás seguro de eliminar este movimiento?')">Eliminar</a>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" style="text-align: right;">Totales:</th>
                    <th id="totalDebe"></th>
                    <th id="totalHaber"></th>
                    <th id="totalSaldo"></tth
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- jQuery -->
    <script src="../public/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" src="../public/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../public/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons JS -->
    <script type="text/javascript" src="../public/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../public/js/buttons.bootstrap4.min.js"></script>
    <!-- JSZip -->
    <script type="text/javascript" src="../public/js/jszip.min.js"></script>
    <!-- PDFMake -->
    <script type="text/javascript" src="../public/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="../public/js/vfs_fonts.js"></script>
    <!-- Buttons HTML5 -->
    <script type="text/javascript" src="../public/js/buttons.html5.min.js"></script>
    <!-- Buttons Print -->
    <script type="text/javascript" src="../public/js/buttons.print.min.js"></script>

    <!-- Inicializar DataTables con Botones, Filtro por Fechas y Totales -->
<script type="text/javascript" src="../public/js/script.js"></script>
</body>

</html>
