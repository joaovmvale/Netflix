var corBotao = "";

$(document).ready(function(){

    $(".mudar").click(function(){
        fPreencher(this);
        fMudar();
    })

    $(".fechar").click(function(){
        fFechar();
        window.location.reload();
    })

    $("#addFav").click(function(){
        fAddFav(this);
    })

});


function fAddFav(botao) {
        var row = $.ajax({
            type:"POST",
            dataType: "json",
            url: "../../php/controlFavoritos.php",
            data: {
                'id': $(botao).attr("movieid")
            },
            success: function(retorno){
                if (retorno.verifica == "true"){
                    $("#addFav").css('background-color', '');
                } else {
                    $("#addFav").css('background-color', 'green');
                }
            }
        });
}

var boo = false;

function fMudar() {
    if(boo) {
        boo = false;
        $(".movieInfo-container").css("display", "none");
    } else {
        boo = true;
        $(".movieInfo-container").css("display", "block");
    }
}

function fFechar() {
    boo = false;
    $(".movieInfo-container").css("display", "none");
}


function fPreencher(botao) {
    var row = $.ajax({
        type:"POST",
        dataType: "json",
        url: "../../php/getInfoFilme.php",
        data: {
            'id': $(botao).attr("movieid")
        }
    });

    var coloreBotao = $.ajax({
        type:"POST",
        dataType: "json",
        url: "../../php/coloreBotaoFav.php",
        data:{
            'id': $(botao).attr("movieid")
        },
        success: function(retorno){
            if (retorno.verifica == "true"){
                corBotao = "green";
            } else {
                corBotao = "";
            }
        }
    });

    $.when(row).then(function(filme){
        $(".teaser").css('background-image', "url('../../images/thumbnails/" + filme["titulo"] + ".jpg')");
        $("#titulo").attr("src", "../../images/titulos/" + filme["titulo"] + ".png");
        $("#relevancia").text(filme["relevancia"] + " relevancia");
        $("#ano").text(filme["ano"]);
        $("#duracao").text(filme["duracao"]);
        $("#sinopse").text(filme["sinopse"]);
        $("#elenco").html("<span>Elenco: </span>" + filme["elenco"]);
        $("#genero").html("<span>Gêneros: </span>" + filme["genero"]);
        $("#cenas").html("<span>Cenas e Momentos: </span>" + filme["cenas"]);
        $(".ytplayer").attr("src", "https://www.youtube.com/embed/" + filme["trailer"] + "?controls=0&showinfo=0&autoplay=1&rel=0&autohide=1");
        $("#addFav").attr("movieid", $(botao).attr("movieid")).css('background-color', corBotao);
    });
}