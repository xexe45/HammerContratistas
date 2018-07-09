function ejecutar() {

    const BASE_URL = ruta;

    //Tabla de datos
    const $table = $('#table');
    const $rutaDefinitivia = ruta;
    //llenarTabla($table,$rutaDefinitivia);
    const $historial = $('#btn-historial');

    $table.hide();
    //llenarTabla($table,$rutaDefinitivia);

    $historial.on('click', function() {
        llenarTabla($table, $rutaDefinitivia);
        $table.show();
        $(this).hide();
    })

}

function llenarTabla($table, rutaDefinitivia) {
    $.get(rutaDefinitivia + 'Sistema/registros', function(response) {
        console.log(response);
        $(function() {
            $table.bootstrapTable({ data: response['data'] });
            $table.bootstrapTable('hideColumn', 'v1');
            $table.bootstrapTable('hideColumn', 'v5');
        });
    }, 'json');

}