function ejecutar() {

    const hoy = new Date();
    //Tabla de datos
    const $table = $('#table');
    const $rutaDefinitivia = ruta;
    //llenarTabla($table,$rutaDefinitivia);
    const $clientes = $('#btn-clientes');
    const url = window.location.href;
    var segment = url.split('/')[6];


    $table.hide();
    //llenarTabla($table,$rutaDefinitivia);

    $clientes.on('click', function() {
        llenarTabla($table, $rutaDefinitivia, segment);
        $table.show();
        $(this).hide();
    })

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
                Swal('El sistema informa', response.join(), 'success');
                $('#form')[0].reset();
            }
        });
    })

}

function llenarTabla($table, rutaDefinitivia, slug) {
    $.get(rutaDefinitivia + 'Proyectos/miGaleria/' + slug, function(response) {
        console.log(response);

        $(function() {
            $table.bootstrapTable({ data: response['data'] });
            $table.bootstrapTable('hideColumn', 'v1');
            $table.bootstrapTable('hideColumn', 'v2');
        });

    }, 'json');

}

function imageFormatter(value, row) {
    let r = ruta + "assets/imgs/galeria/" + value;
    return '<img width="150" class="img-fluid" src="' + r + '" />';
}