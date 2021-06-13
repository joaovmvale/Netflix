$(document).ready(function(){

    fCreateCards();

});

function fCreateCards(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../php/montaSearch.php",
        success: function(retorno){
            $(".cards").html("");
            var arraySearch = retorno.arraySearch;
            for(var i = 0; i < retorno.tamanhoSearch; i++) {
                var card = ''
                card += '<div movieid="' + retorno.arraySearch[i][0] + '" id="' + i + '" class="card mudar">'
                card += '</div>'
                $(".cards").append(card);
                $("#"+i).css("background-image", "url('../../images/thumbnails/" + arraySearch[i][1] + ".jpg')");
            }
            $(".mudar").click(function(){
                fPreencher(this);
                fMudar();
            })
        }
    });
}