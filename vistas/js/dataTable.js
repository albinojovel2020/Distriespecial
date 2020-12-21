/* tabla dinámica para mostrar y buscar datos activos */
$(document).ready(function() {
    $('#tabla-activos').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;

            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            // Total over all pages
            total = api
                .column(2)
                .data()
                .reduce(function(a, b) {
                    var total = intVal(a) + intVal(b);
                    return total.toFixed(2);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(2, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    var suu = intVal(a) + intVal(b);
                    return suu.toFixed(2);
                }, 0);

            // Update footer
            $(api.column(2).footer()).html(
                '$' + pageTotal + ' ( $' + total + ' total)'
            );
        },
        "lengthMenu": [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "TODOS"]
        ],
        "language": {
            "sProcessing": "<i class='azul-ast-text'>Procesando...</i>",
            "sLengthMenu": "<i class='azul-ast-text'>Mostrar</i> _MENU_ <i class='azul-ast-text'>Registros</i>",
            "sZeroRecords": "<b><i class='red-text'>No se encontraron resultados</i></b>",
            "sEmptyTable": "<b><i class='red-text'>Ningún dato disponible en esta tabla</i></b>",
            "sInfo": "<i class='azul-ast-text'>Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros</i>",
            "sInfoEmpty": "<i class='red-text'>Mostrando registros del 0 al 0 de un total de 0 registros</i>",
            "sInfoFiltered": "<i class='black-text'>(filtrado de un total de _MAX_ registros)</i>",
            "sInfoPostFix": "",
            "sSearch": " <i class='material-icons bus'>search</i>",
            "searchPlaceholder": "Click para buscar",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<i class='naranja-ast-text'>Primero</i>",
                "sLast": "<i class='naranja-ast-text'>Último</i>",
                "sNext": "<i class='naranja-ast-text'>Siguiente</i>",
                "sPrevious": "<i class='naranja-ast-text'>Anterior</i>"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $("select").val('10');
    $("select").addClass("browser-default");
    // $('label').addClass('form-inline');
    $('input[type="search"]').addClass('browser-default buscador');

});


/* tabla dinámica para mostrar y buscar datos inactivos */
$(document).ready(function() {
    $('#tabla-inactivos').DataTable({
        "language": {
            "sProcessing": "<i class='naranja-ast-text'>Procesando...</i>",
            "sLengthMenu": "<i class='naranja-ast-text'>Mostrar</i> _MENU_ <i class='naranja-ast-text'>Registros</i>",
            "sZeroRecords": "<b><i class='red-text'>No se encontraron resultados</i></b>",
            "sEmptyTable": "<b><i class='red-text'>Ningún dato disponible en esta tabla</i></b>",
            "sInfo": "<i class='naranja-ast-text'>Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros</i>",
            "sInfoEmpty": "<i class='red-text'>Mostrando registros del 0 al 0 de un total de 0 registros</i>",
            "sInfoFiltered": "<i class='black-text'>(filtrado de un total de _MAX_ registros)</i>",
            "sInfoPostFix": "",
            "sSearch": " <i class='material-icons bus'>search</i>",
            "searchPlaceholder": "Click para buscar",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<i class='azul-ast-text'>Primero</i>",
                "sLast": "<i class='azul-ast-text'>Último</i>",
                "sNext": "<i class='azul-ast-text'>Siguiente</i>",
                "sPrevious": "<i class='azul-ast-text'>Anterior</i>"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $("select").val('10');
    $("select").addClass("browser-default ssl");
    $('input[type="search"]').addClass('browser-default buscador');

});

$(document).ready(function() {
    $('#tabla-stok').DataTable({
        "language": {
            "sProcessing": "<i class='naranja-ast-text'>Procesando...</i>",
            "sLengthMenu": "<i class='naranja-ast-text'>Mostrar</i> _MENU_ <i class='naranja-ast-text'>Registros</i>",
            "sZeroRecords": "<b><i class='red-text'>No se encontraron resultados</i></b>",
            "sEmptyTable": "<b><i class='red-text'>Ningún dato disponible en esta tabla</i></b>",
            "sInfo": "<i class='naranja-ast-text'>Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros</i>",
            "sInfoEmpty": "<i class='red-text'>Mostrando registros del 0 al 0 de un total de 0 registros</i>",
            "sInfoFiltered": "<i class='black-text'>(filtrado de un total de _MAX_ registros)</i>",
            "sInfoPostFix": "",
            "sSearch": " <i class='material-icons bus'>search</i>",
            "searchPlaceholder": "Click para buscar",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<i class='azul-ast-text'>Primero</i>",
                "sLast": "<i class='azul-ast-text'>Último</i>",
                "sNext": "<i class='azul-ast-text'>Siguiente</i>",
                "sPrevious": "<i class='azul-ast-text'>Anterior</i>"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $("select").val('10');
    $("select").addClass("browser-default ssl");
    $('input[type="search"]').addClass('browser-default buscador');

});


$(document).ready(function() {
    $('#tabla-1').DataTable({
        "language": {
            "sProcessing": "<i class='naranja-ast-text'>Procesando...</i>",
            "sLengthMenu": "<i class='naranja-ast-text'>Mostrar</i> _MENU_ <i class='naranja-ast-text'>Registros</i>",
            "sZeroRecords": "<b><i class='red-text'>No se encontraron resultados</i></b>",
            "sEmptyTable": "<b><i class='red-text'>Ningún dato disponible en esta tabla</i></b>",
            "sInfo": "<i class='naranja-ast-text'>Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros</i>",
            "sInfoEmpty": "<i class='red-text'>Mostrando registros del 0 al 0 de un total de 0 registros</i>",
            "sInfoFiltered": "<i class='black-text'>(filtrado de un total de _MAX_ registros)</i>",
            "sInfoPostFix": "",
            "sSearch": " <i class='material-icons bus'>search</i>",
            "searchPlaceholder": "Click para buscar",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<i class='azul-ast-text'>Primero</i>",
                "sLast": "<i class='azul-ast-text'>Último</i>",
                "sNext": "<i class='azul-ast-text'>Siguiente</i>",
                "sPrevious": "<i class='azul-ast-text'>Anterior</i>"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $("select").val('10');
    $("select").addClass("browser-default ssl");
    $('input[type="search"]').addClass('browser-default buscador');

});