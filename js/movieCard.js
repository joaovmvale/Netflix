$(document).ready(function () {

    fMontaCard();
});

function fMontaCard() {

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../php/montaCardFilmes.php",
        success: function(retorno){
            $(".content").html("");
            var array = retorno.array;
            alert(array[0][2]);
            for(var i = 0; i < retorno.tamanhoFilmes; i++) {
                var card = ''
                card += '<div class="movieCard">'
                card += '    <div class="movieImage" style="background-image: url("../../images/thumbnails/'+ array +'.webp")""></div>'
                card += '    <div class="movieCardData">'
                card += '    <div class="movieCardButton">'
                card += '        <div>'
                card += '            <button class="bCircle"><i class="fa fa-play"></i></button>'
                card += '            <button class="bCircle"><i class="fa fa-plus"></i></button>'
                card += '            <button class="bCircle"><i class="fa fa-thumbs-up"></i></button>'
                card += '            <button class="bCircle"><i class="fa fa-thumbs-down"></i></button>'
                card += '        </div>'
                card += '        <button movieid="1" class="mudar bCircle bCircle-info"><i class="fa fa-chevron-down"></i></button>'
                card += '    </div>'
                card += '    <div class="movieCardInfo">'
                card += '        <p>'
                card += '            <span id="relevancia">98% relevante</span>'
                card += '            <span>14</span>'
                card += '            <span>1h 30min</span>'
                card += '        </p>'
                card += '        <p class="generos">'
                card += '            <span>Categoria 1</span>'
                card += '            &#8226;'
                card += '            <span>Categoria 2</span>'
                card += '            &#8226;'
                card += '            <span>Categoria 3</span>'
                card += '        </p>'
                card += '    </div>'
                card += '    </div>'
                card += '</div>'
        
                $(".content").append(card);

                $("#abrir").click(function(){
                    fAbrir();
                })
            }
        }

    });
}

