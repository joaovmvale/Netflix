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
                        filmeAtual.css("background-image", "url('../../images/thumbnails/"+retorno.filmes[cont][1]+".webp')");
                        filmeAtual.attr("movieid", retorno.filmes[cont][0]);

                    }
                    cont++;
                    filmeAtual.append(cont)
                }
            }     
        } 
    });
}

