$(document).ready(function(){

    $(".mudar").click(function(){
        fPreencher(this);
        fMudar();
    })

    $(".fechar").click(function(){
        fFechar()
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
            }
        });

        /*$.ajax({
        type: "POST",
        dataType: "json",
        url: "../../php/montaCardFilmes.php",
        success: function(retorno){
            var cont = 0;
            for(i = 1; i <= 5; i++) {
                for(j = 1; j <= 6; j++) {
                    var categoriaAtual = "#carolFilmes"
                    var filmeAtual = $(categoriaAtual + " section:nth-child("+i+") div:nth-child("+j+")");
                    if(cont < retorno.tamanhoFilmes) {
                        filmeAtual.css("background-image", "url('../../images/thumbnails/"+retorno.filmes[cont][1]+".webp')");
                        filmeAtual.attr("movieid", retorno.filmes[cont][0]);

                    }
                    cont++;
                    filmeAtual.append(cont)
                }
            }     
        } 
    });*/

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
        $(".ytplayer").attr("src", "https://www.youtube.com/embed/" + filme["trailer"]);
        $("#addFav").attr("movieid", $(botao).attr("movieid"));
    })
}

