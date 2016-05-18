$(document).ready(function ($) {
    $.post('http://localhost/novabici/php/webServicesAdministrador.php', {
        'salida': '5'
    }, function (resultado) {
        var productos = JSON.parse(resultado);
        $.each(productos, function (index, producto) {
            var elemDiv = $('<div/>', {
                'class': 'row container'
            });
            var elemDiv2 = $('<div/>', {
                'class': 'col-xs-12 col-sm-1 col-md-1 col-lg-1'
            });
            var elemA = $('<a/>', {
                'class': 'apublic'
                , 'href': 'contacto.html#' + producto.idProductos
            });
            var elemDiv3 = $('<div/>', {
                'class': 'col-xs-12 col-sm-8 col-md-8 col-lg-8'
            });
            var elemDiv4 = $('<div/>', {
                'class': 'row publicacion'
            });
            var elemDiv5 = $('<div/>', {
                'class': 'container-fluid'
            });
            var elemH3 = $('<h3/>', {
                'html': producto.nombre
            });
            var elemDiv6 = $('<div/>', {
                'class': 'row'
            });
            var elemDiv7 = $('<div/>', {
                'class': 'container-fluid'
            });
            var elemDiv8 = $('<div/>', {
                'class': 'col-xs-12 col-sm-8 col-md-8 col-lg-8'
            });
            var elemP = $('<p/>', {
                'class': 'text-justify'
                , 'html': producto.descripcion
            });
            var elemP2 = $('<p/>', {
                'class': 'text-justify'
                , 'html': 'Renta por: $' + producto.precio
            });
            var elemDiv9 = $('<div/>', {
                'class': 'col-xs-12 col-sm-4 col-md-4 col-lg-4'
            });
            var elemImg = $('<img/>', {
                'class': 'img-responsive'
                , 'src': producto.url
            });
            var elemDiv10 = $('<div/>', {
                'class': 'col-xs-12 col-sm-3 col-md-3 col-lg-3'
            });
            elemDiv5.append(elemH3);
            elemDiv8.append(elemP);
            elemDiv8.append(elemP2);
            elemDiv7.append(elemDiv8);
            elemDiv9.append(elemImg);
            elemDiv7.append(elemDiv9);
            elemDiv6.append(elemDiv7);
            elemDiv4.append(elemDiv5);
            elemDiv4.append(elemDiv6);
            elemDiv4.append(elemDiv10);
            elemDiv3.append(elemDiv4);
            elemA.append(elemDiv3);
            elemDiv.append(elemDiv2);
            elemDiv.append(elemA);
            elemDiv.append(elemDiv10);
            $('#containerPub').append(elemDiv);
        });

    });
});
