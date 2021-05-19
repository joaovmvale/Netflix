$(document).ready(function () {

    fMontaCard();
});

function fMontaCard() {
    
    $.ajax({
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
                        filmeAtual.css("background-image", "url('../../images/thumbnails/"+retorno.filmes[cont][1]+".jpg')");
                        filmeAtual.attr("movieid", retorno.filmes[cont][0]);

                    }
                    cont++;
                    //filmeAtual.append(cont)
                }
            }   

            var cont = 0;
            for(i = 1; i <= 5; i++) {
                for(j = 1; j <= 6; j++) {
                    var categoriaAtual = "#carolSeries"
                    var filmeAtual = $(categoriaAtual + " section:nth-child("+i+") div:nth-child("+j+")");
                    if(cont < retorno.tamanhoSeries) {
                        filmeAtual.css("background-image", "url('../../images/thumbnails/"+retorno.series[cont][1]+".jpg')");
                        filmeAtual.attr("movieid", retorno.series[cont][0]);

                    }
                    cont++;
                    //filmeAtual.append(cont)
                }
            }   

            
            var cont = 0;
            for(i = 1; i <= 5; i++) {
                for(j = 1; j <= 6; j++) {
                    var categoriaAtual = "#carolFavoritos"
                    var filmeAtual = $(categoriaAtual + " section:nth-child("+i+") div:nth-child("+j+")");
                    if(cont < retorno.tamanhoFavoritos) {
                        filmeAtual.css("background-image", "url('../../images/thumbnails/"+retorno.favoritos[cont][1]+".jpg')");
                        filmeAtual.attr("movieid", retorno.favoritos[cont][0]);

                    }
                    cont++;
                    //filmeAtual.append(cont)
                }
            }   

            console.log(retorno.favoritos)
        } 
    });
}