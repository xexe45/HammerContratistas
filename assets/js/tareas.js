function ejecutar() {

    const BASE_URL = ruta;

    comboServicios(BASE_URL + "Servicio");

    //Tabla de datos
    const $table = $('#table');
    const $rutaDefinitivia = ruta;
    //llenarTabla($table,$rutaDefinitivia);
    const $clientes = $('#btn-clientes');

    $table.hide();
    //llenarTabla($table,$rutaDefinitivia);

    $clientes.on('click', function() {
        llenarTabla($table, $rutaDefinitivia);
        $table.show();
        $(this).hide();
    })

    $('#form').on('submit', function(e) {

        e.preventDefault();

        const method = $(this).attr('method');
        const ruta = $(this).attr('action');
        const data = $(this).serialize();

        $.ajax({
            url: ruta,
            type: method,
            data: data,
            dataType: 'json',
            beforeSend: function() {
                console.log('enviando....');
            },
            success: function(response) {
                console.log(response);
                if (response['valido']) {
                    Swal('El sistema informa', response['mensaje'], 'success');
                    $('#form')[0].reset();
                    $table.bootstrapTable('refresh', {
                        url: $rutaDefinitivia + 'Tarea'
                    });
                } else {
                    Swal('Oops...', response['mensaje'], 'error')
                }
            }
        });

    })

}

function comboServicios(ruta) {

    $.ajax({
        url: ruta,
        type: 'get',
        dataType: 'json',
        success: function(response) {

            console.log(response);
            var options = "<option value=''>Seleccionar Servicio...</option>";

            for (var i = 0; i < response['data'].length; i++) {
                options += "<option value='" + response['data'][i]['v1'] + "'>" + response['data'][i]['v2'] + "</option>";
            }

            $('#servicio_id').html(options);

        }
    });

}

function llenarTabla($table, rutaDefinitivia) {

    $.get(rutaDefinitivia + 'Tarea', function(response) {
        console.log(response);

        $(function() {
            $table.bootstrapTable({ data: response['data'] });
            $table.bootstrapTable('hideColumn', 'v1');
            $table.bootstrapTable('hideColumn', 'v2');

        });
    }, 'json');

}