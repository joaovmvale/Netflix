$(document).ready(function(){

    fLocalEventosClick();

});

function fLocalEventosClick(){

    $("#btnLogin").click(function(){

        fLocalEventosClick();

    });

}

function fLocalComunicaServidor(){

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/enviar.php",
        data: {
            nome: $("#username").val();
            password: $("#password").val()
        },
        sucess: function(retorno){}
    })

}