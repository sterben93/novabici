$(document).ready(function($){
    if($cookie('sesion')==undefined){
        $('#inicioS').show();
        $('#productos').hide();
        $('#notificacion').hide();
        $('#cerrarS').hide();
    }else{
        $('#inicioS').hide();
        $('#productos').show();
        $('#notificacion').show();
        $('#cerrarS').show();
    }
    $('#cerrarS').click(function(){
        $removeCookie("email");
        $removeCookie("sesion");
        window.location.href='http://localhost/novabici/index.html';
        window.location.reload;
    });
});
