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
                    var filmeAtual = $("section:nth-child("+i+") div:nth-child("+j+")");
                    filmeAtual.css("background-image", "url('../../images/thumbnails/"+retorno.id[cont][1]+".webp')");
                    filmeAtual.attr("movieid", retorno.id[cont][0]);
                    cont++;
                }

                

            }
            alert(retorno.id[0][0]);        
        } 

    });
}

