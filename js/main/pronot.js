$(document).ready(function ($) {
    $.post('http://localhost/novabici/php/webServicesAdministrador.php', {
        'salida': 7
        , 'id': $cookie('id')
    }, function (resultado) {
        var notificaciones = JSON.parse(resultado);
        $.each(notificaciones, function (index, notificacion) {
            alert(notificacion.nombre);
            var elemDiv = $('<div/>', {
                'class': 'row container notificacion'
                , 'html': '<p><b>Nombre: </b>' + notificacion.nombreCliente + ' ' + notificacion.apPatCliente + ' '+
                notificacion.apMatCliente + '</p>' +
                '<p><b>Correo: </b>' + notificacion.correo + '</p>' +
                '<p><b>Telefono: </b>' + notificacion.telefono + '</p>' +
                '<p><b>Mensaje: </b>' + notificacion.mensaje + '</p>'+
                '<p><b>Producto: </b>' + notificacion.nombre + '</p>'      });
            $('#listaNot').append(elemDiv);
        });
    });
    var urlActual = window.location.href;
    if (urlActual.search('#') > 0) {
        urlActual = urlActual.split('#');
        if (urlActual[1] == 'productos') {
            $('#pesPro').addClass('active');
            $('#formProducto').show();
            $('#notificaciones').hide();
        } else {
            $('#pesNot').addClass('active');
            $('#formProducto').hide();
            $('#notificaciones').show()
        }
    }
    $('#pesPro').click(function () {
        $('#pesPro').addClass('active');
        $('#pesNot').removeClass('active');
        $('#formProducto').show();
        $('#notificaciones').hide();
    });
    $('#pesNot').click(function () {
        $('#pesPro').removeClass('active');
        $('#pesNot').addClass('active');
        $('#formProducto').hide();
        $('#notificaciones').show();
    })
    $('input#id').val($cookie('id'));
});
