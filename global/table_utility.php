<!--Jquery-->
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#idTabla').DataTable({
            language: {
                decimal: ",",
                thousands: ".",
                processing: "Procesando...",
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ registros",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty: "No hay registros disponibles",
                infoFiltered: "(filtrado de _MAX_ registros en total)",
                loadingRecords: "Cargando...",
                zeroRecords: "No se encontraron registros",
                emptyTable: "No hay datos disponibles en la tabla",
                paginate: {
                    first: "Primero",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Último"
                },
                aria: {
                    sortAscending: ": activar para ordenar de manera ascendente",
                    sortDescending: ": activar para ordenar de manera descendente"
                }
            },
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'Todos']
            ]
        });

        // Exportar a Excel
        $('#exportar').click(function() {
            var nombreTabla = 'ExcelData';
            var datos = [];

            $('#idTabla').find('thead tr').each(function() {
                var encabezado = [];
                $(this).find('th').each(function() {
                    encabezado.push($(this).text());
                });
                datos.push(encabezado);
            });

            $('#idTabla').find('tbody tr').each(function() {
                var fila = [];
                $(this).find('td').each(function() {
                    fila.push($(this).text());
                });
                datos.push(fila);
            });

            var form = $('<form>', {
                method: 'POST',
                action: '../Utilidades/ConvertirExcel.php'
            });

            $('<input>', {
                type: 'hidden',
                name: 'datos',
                value: JSON.stringify(datos)
            }).appendTo(form);

            $('<input>', {
                type: 'hidden',
                name: 'nombreTabla',
                value: nombreTabla
            }).appendTo(form);

            form.appendTo('body').submit();
        });

        // Exportar a PDF
        $('#exportarPDF').click(function() {
            var nombreTabla = 'PdfData';
            var datos = [];

            $('#idTabla').find('thead tr').each(function() {
                var encabezado = [];
                $(this).find('th').each(function() {
                    encabezado.push($(this).text());
                });
                datos.push(encabezado);
            });

            $('#idTabla').find('tbody tr').each(function() {
                var fila = [];
                $(this).find('td').each(function() {
                    fila.push($(this).text());
                });
                datos.push(fila);
            });

            var form = $('<form>', {
                method: 'POST',
                action: '../Utilidades/ConvertirPdf.php'
            });

            $('<input>', {
                type: 'hidden',
                name: 'datos',
                value: JSON.stringify(datos)
            }).appendTo(form);

            $('<input>', {
                type: 'hidden',
                name: 'nombreTabla',
                value: nombreTabla
            }).appendTo(form);

            form.appendTo('body').submit();
        });
    });
</script>