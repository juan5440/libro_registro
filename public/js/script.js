$(document).ready(function() {
    var table = $('#movimientosTable').DataTable({
        dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        buttons: [{
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-danger',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                className: 'btn btn-info',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            }
        ],
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        pageLength: 10, // Mostrar 10 registros por página
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Todos"]
        ],
        footerCallback: function(row, data, start, end, display) {
            var api = this.api();

            function convertirANumero(valor) {
                valor = valor.replace(/[^0-9.-]/g, '');
                return parseFloat(valor) || 0;
            }

            var totalDebe = api
                .column(3, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return a + convertirANumero(b);
                }, 0);

            var totalHaber = api
                .column(4, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return a + convertirANumero(b);
                }, 0);

            $('#totalDebe').html(totalDebe.toFixed(2));
            $('#totalHaber').html(totalHaber.toFixed(2));

            var saldo = totalDebe - totalHaber;
            $('#totalSaldo').html(saldo.toFixed(2));
        }
    });

    // Filtro por rango de fechas
    $('#filtrarFecha').on('click', function() {
        var fechaInicio = $('#fechaInicio').val();
        var fechaFin = $('#fechaFin').val();
        table.column(0).search(fechaInicio + '|' + fechaFin, true, false).draw();
    });
});