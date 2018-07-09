function ejecutar() {

    const $rutaDefinitivia = window.location.href;
    const $btn1 = $('#btn1');
    const $btn2 = $('#btn2');
    const BASE_URL = ruta;

    $('#chartContainer, #chartContainer2, #chartContainer3').hide();

    $("#user_id").tokenInput(BASE_URL + "Usuario/buscar", {
        theme: "facebook",
        tokenLimit: 1
    });


    $btn1.on('click', function() {
        $.ajax({
            url: BASE_URL + 'Reportes/registros',
            type: 'get',
            data: {},
            dataType: 'json',
            success: function(response) {
                $('#chartContainer').show();
                $btn1.hide();
                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    title: {
                        text: "Comparativa Registros - Ediciones"
                    },
                    data: [{
                        type: "pie",
                        startAngle: 240,
                        yValueFormatString: "##0.00\"%\"",
                        indexLabel: "{label} {y}",
                        dataPoints: response
                    }]
                });
                chart.render();
            }
        });
    })

    $btn2.on('click', function() {
        $.ajax({
            url: BASE_URL + 'Reportes/iteracciones',
            type: 'get',
            data: {},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#chartContainer2').show();
                $btn2.hide();
                var chart = new CanvasJS.Chart("chartContainer2", {
                    animationEnabled: true,
                    theme: "light2", // "light1", "light2", "dark1", "dark2"
                    title: {
                        text: "Iteracciones por mes"
                    },
                    axisY: {
                        title: "Iteracciones"
                    },
                    data: [{
                        type: "column",
                        showInLegend: true,
                        legendMarkerColor: "grey",
                        legendText: "Meses",
                        dataPoints: response
                    }]
                });
                chart.render();
            }
        });
    })

    $('#form').on('submit', function(e) {

        e.preventDefault();

        const metodo = $(this).attr('method');
        const ruta = $(this).attr('action');
        const formData = $(this).serialize();

        $.ajax({
            url: ruta,
            type: metodo,
            data: formData,
            dataType: 'json',
            beforeSend: function() {
                console.log('enviando');
            },
            success: function(response) {
                console.log(response);
                if (response['valido']) {
                    if (response['reporte'].length > 0) {

                        $('#chartContainer3').show();

                        var chart = new CanvasJS.Chart("chartContainer3", {
                            animationEnabled: true,
                            title: {
                                text: ""
                            },
                            data: [{
                                type: "pie",
                                startAngle: 240,
                                yValueFormatString: "#",
                                indexLabel: "{label} {y}",
                                dataPoints: response['reporte']
                            }]
                        });
                        chart.render();

                    } else {
                        Swal('El sistema informa', 'El usuario seleccionado no registra iteracciones con el sistema entre las fechas establecidad', 'warning');
                    }

                } else {
                    Swal('Oops...', response['mensaje'], 'error');
                }

            }
        });
    })

}