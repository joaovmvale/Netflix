
var arquivo;
var formData = new FormData();
var formData2 = new FormData();
var titulo;

$(document).ready(function(){
    
    $("#arquivo").change(function(){
        arquivo = document.getElementById("arquivo").files[0];
        formData.append("file", arquivo);
    });

    $("#arquivo2").change(function(){
        arquivo = document.getElementById("arquivo2").files[0];
        formData2.append("file", arquivo);
    });

    $("#bEnviar").click(function(){

        fLocalComunicaServidor("formAddFilme");

        return false;
    });

});

function fSalvarFotos(titulo) {

    formData.append("titulo", titulo)
    formData2.append("titulo", titulo)

    $.ajax({
        url: "../../php/uploadTitulo.php",
        type:"post",
        data: formData,
        contentType: false,
        cache: false,
        processData: false
    });

    $.ajax({
        url: "../../php/uploadThumbnail.php",
        type:"post",
        data: formData2,
        contentType: false,
        cache: false,
        processData: false
    });

}

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
            fSalvarFotos(retorno.titulo);
        }

    });  
}


