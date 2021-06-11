$(document).ready(function(){

    fCreateCards();

});

function fCreateCards(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../php/montaCardFilmes.php",
        success: function(retorno){
            $(".cards").html("");
            var arraySeries = retorno.series;
            for(var i = 0; i < retorno.tamanhoSeries; i++) {
                var card = ''
                card += '<div movieid="' + retorno.series[i][0] + '" id="' + i + '" class="card mudar">'
                card += '</div>'
                $(".cards").append(card);
                $("#"+i).css("background-image", "url('../../images/thumbnails/" + arraySeries[i][1] + ".jpg')");

            }
            $(".mudar").click(function(){
                fPreencher(this);
                fMudar();
            })
        }
    });
}