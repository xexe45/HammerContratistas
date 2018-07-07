$(function() {

    const BASE_URL = "http://localhost:8090/HammerContratistas/";

    //Tabla de datos
    const $table = $('#table');
    const $rutaDefinitivia = 'http://localhost:8090/HammerContratistas/';
    //llenarTabla($table,$rutaDefinitivia);
    const $historial = $('#btn-historial');

    $table.hide();
    //llenarTabla($table,$rutaDefinitivia);

    $historial.on('click', function() {
        llenarTabla($table, $rutaDefinitivia);
        $table.show();
        $(this).hide();
    })

})

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