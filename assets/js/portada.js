function ejecutar() {

    //Tabla de datos
    const $table = $('#table');
    const $rutaDefinitivia = ruta;
    //llenarTabla($table,$rutaDefinitivia);
    const $clientes = $('#btn-clientes');
    const $button = $('#button');

    $table.hide();
    $button.hide();
    //llenarTabla($table,$rutaDefinitivia);

    $clientes.on('click', function() {
        llenarTabla($table, $rutaDefinitivia);
        $table.show();
        $button.show();
        $(this).hide();
    })

    $button.on('click', function() {
        var seleccionado = $table.bootstrapTable('getSelections');

        if (seleccionado.length == 0) {
            Swal('El sistema informa', 'No ha seleccionado ningún registro', 'warning');
            return;
        }

        $.ajax({
            url: $rutaDefinitivia + "Portada/delete",
            type: 'post',
            data: { id: seleccionado[0]['v1'] },
            dataType: 'json',
            success: function(response) {

                if (response['valido']) {

                    Swal('El sistema informa', response['mensaje'], 'success');
                    $table.bootstrapTable('refresh', {
                        url: $rutaDefinitivia + 'Portada'
                    });
                } else {
                    Swal('Oops...', response['mensaje'], 'error');
                }
            }
        });
    });
    
    $('#form').on('submit', function(e) {

        e.preventDefault();

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
                    $('#form')[0].reset();
                    $table.bootstrapTable('refresh', {
                        url: $rutaDefinitivia + 'Portada'
                    });
                } else {
                    Swal('Oops...', response['mensaje'], 'error');
                }
            }
        });
    })

}

function llenarTabla($table, rutaDefinitivia) {
    $.get(rutaDefinitivia + 'Portada', function(response) {
        console.log(response);

        $(function() {
            $table.bootstrapTable({ data: response['data'] });
            $table.bootstrapTable('hideColumn', 'v1');
        });
    }, 'json');

}

function imageFormatter(value, row) {
    let r = ruta + "assets/imgs/portada/" + value;
    return '<img width="200" class="img-fluid" src="' + r + '" />';
}