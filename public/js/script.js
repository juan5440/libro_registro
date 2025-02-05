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

            // Calcular el saldo (totalDebe - totalHaber)
            var saldo = totalDebe - totalHaber;
            $('#totalSaldo').html(saldo.toFixed(2));
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
