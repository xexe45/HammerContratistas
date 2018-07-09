function ejecutar() {

    const BASE_URL = ruta;
    const hoy = new Date();
    //Tabla de datos
    const $table = $('#table');
    const $rutaDefinitivia = ruta;
    //llenarTabla($table,$rutaDefinitivia);
    const $clientes = $('#btn-clientes');

    comboServicios(BASE_URL + "Proyectos/servicios");
    comboClientes(BASE_URL + "Clientes");

    $("#cliente_id").tokenInput(BASE_URL + "Clientes/buscar", {
        theme: "facebook",
        tokenLimit: 1
    });

    $table.hide();
    //llenarTabla($table,$rutaDefinitivia);

    $clientes.on('click', function() {
        llenarTabla($table, $rutaDefinitivia);
        $table.show();
        $(this).hide();
    })

    $('#nombre').on('change', function() {
        const slug = $.slugify($(this).val());
        $('#slug').val(slug);
    })


    $('#form').on('submit', function(e) {

        e.preventDefault();


        var $fecha = $('#fecha').val();
        var anio = new Date($fecha);



        if (!anio) {
            Swal('Oops...', 'Ingrese una fecha', 'warning');
            return;
        }

        if (anio.getFullYear() < 2016) {
            Swal('Oops...', 'Recuerda que la empresa empezó a funcionar en el año 2016', 'warning');
            return;
        }



        if (anio > hoy && $('#tipo').val() == 'concluido') {
            Swal('Oops...', 'Ingrese una fecha correcta', 'warning');
            return;
        }


        const metodo = $(this).attr('method');
        const ruta = $(this).attr('action');
        const formData = new FormData($('#form')[0]);

        $.ajax({
            url: ruta,
            type: metodo,
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                console.log('enviando');
            },
            success: function(response) {
                console.log(response);

                if (response['valido']) {

                    Swal('El sistema informa', response['mensaje'], 'success');
                    $("#cliente_id").tokenInput("clear");
                    $('#form')[0].reset();
                    $table.bootstrapTable('refresh', {
                        url: $rutaDefinitivia + 'Proyectos'
                    });
                } else {
                    Swal('Oops...', response['mensaje'], 'error');
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

function comboClientes(ruta) {

    $.ajax({
        url: ruta,
        type: 'get',
        dataType: 'json',
        success: function(response) {

            console.log(response);
            var options = "<option value=''>Seleccionar Cliente...</option>";

            for (var i = 0; i < response['data'].length; i++) {
                options += "<option value='" + response['data'][i]['v1'] + "'>" + response['data'][i]['v2'] + "</option>";
            }

            $('#cliente_id').html(options);

        }
    });

}

function llenarTabla($table, rutaDefinitivia) {
    $.get(rutaDefinitivia + 'Proyectos', function(response) {
        console.log(response);
        $(function() {
            $table.bootstrapTable({ data: response['data'] });
            $table.bootstrapTable('hideColumn', 'v1');
            $table.bootstrapTable('hideColumn', 'v2');
            $table.bootstrapTable('hideColumn', 'v6');
        });
    }, 'json');

}

function imageFormatter(value, row) {
    let r = ruta + "assets/imgs/proyectos/" + value;
    return '<img width="150" class="img-fluid" src="' + r + '" />';
}


function buttonFormatter(value) {
    return '<a href="' + ruta + 'Proyectos/galeria/' + value + '" class="btn btn-success">Galería de Imágenes</a>';

}