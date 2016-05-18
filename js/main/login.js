var mensajes={'registro':'Usuario registrado', 'errorRegistro':'Ocurrio un error en el servidor','errorLogin':'Correo o contraseña incorrecta'}
$(document).ready(function($){
    var urlActual = window.location.href;
    if (urlActual.search('#') > 0) {
        urlActual = urlActual.split('#');
        alert(mensajes[urlActual[1]]);
    }
});
