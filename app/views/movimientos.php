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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/all.min.css">
    <!-- CSS personalizado -->
    <style>
    .dt-buttons {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .date-range-filter {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 10px;
    }

    .date-range-filter input {
        margin-left: 10px;
    }

    tfoot {
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Registro de Movimientos</h1>
        <form action="index.php?action=add" method="POST">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="factura">Factura</label>
                    <input type="text" class="form-control" id="factura" name="factura" required>
                </div>
                <div class="form-group col-md-4">
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
                    <th></th>
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
    <script>
    $(document).ready(function() {
        var table = $('#movimientosTable').DataTable({
            dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            buttons: [{
                    extend: 'excel', // Botón para exportar a Excel
                    text: '<i class="fas fa-file-excel"></i> Excel', // Icono y texto
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: ':not(:last-child)' // Excluir la última columna (acciones)
                    }
                },
                {
                    extend: 'pdf', // Botón para exportar a PDF
                    text: '<i class="fas fa-file-pdf"></i> PDF', // Icono y texto
                    className: 'btn btn-danger',
                    exportOptions: {
                        columns: ':not(:last-child)' // Excluir la última columna (acciones)
                    }
                },
                {
                    extend: 'print', // Botón para imprimir
                    text: '<i class="fas fa-print"></i> Imprimir', // Icono y texto
                    className: 'btn btn-info',
                    exportOptions: {
                        columns: ':not(:last-child)' // Excluir la última columna (acciones)
                    }
                }
            ],
            language: {
                url: '../public/js/es-ES.json' // Español
            },
            footerCallback: function(row, data, start, end, display) {
                var api = this.api();

                // Función para limpiar y convertir a número
                function convertirANumero(valor) {
                    // Eliminar comas y otros caracteres no numéricos
                    valor = valor.replace(/[^0-9.-]/g, '');
                    // Convertir a número flotante
                    return parseFloat(valor) || 0; // Si no es un número válido, devolver 0
                }

                // Calcular el total de la columna "Debe" (columna 3)
                var totalDebe = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return a + convertirANumero(b);
                    }, 0);

                // Calcular el total de la columna "Haber" (columna 4)
                var totalHaber = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return a + convertirANumero(b);
                    }, 0);

                // Mostrar los totales en el footer
                $('#totalDebe').html(totalDebe.toFixed(2));
                $('#totalHaber').html(totalHaber.toFixed(2));
            }
        });

        // Filtro por rango de fechas
        $('#filtrarFecha').on('click', function() {
            var fechaInicio = $('#fechaInicio').val();
            var fechaFin = $('#fechaFin').val();

            // Filtrar por la columna de fecha (columna 0)
            table.column(0).search(fechaInicio + '|' + fechaFin, true, false).draw();
        });
    });
    </script>
</body>

</html>