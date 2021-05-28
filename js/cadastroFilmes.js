$(document).ready(function(){
    
    $("#enviarFilme").click(function(){
        fLocalComunicaServidor("formAddFilme");
        return false;

    });

});

function fLocalComunicaServidor(form) 
{
    var dados = $("#"+form).serialize();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../php/cadastroFilmes.php",
        data: dados,
        success: function(retorno) {
            alert(retorno.mensagem);
        }

    });
}