$(document).ready(function(){
    $("#mudar").click(function(){
        fPreencher();
        fMudar();
    })
});


var boo = false;

function fMudar() {

    if(boo) {
        boo = false;
        $(".movieInfo").css("display", "none");
    } else {
        boo = true;
        $(".movieInfo").css("display", "block");
    }    

}

function fPreencher() {

    var row = $.ajax({
        type:"POST",
        dataType: "json",
        url: "../../php/getInfoFilme.php",
        data: {
            'id': $("#mudar").attr("movieid")
        }
    });

    $.when(row).then(function(filme){
        console.log(filme)
        console.log("../../images/thumbnails/" + filme["titulo"] + ".jpg")
        $(".teaser").css('background-image', "url('../../images/thumbnails/" + filme["titulo"] + ".jpg')");
        $("#titulo").attr("src", "../../images/titulos/" + filme["titulo"] + ".png")
        $("#relevancia").text(filme["relevancia"]);
        $("#ano").text(filme["ano"]);
        $("#duracao").text(filme["duracao"]);
        $("#sinopse").text(filme["sinopse"]);
        $("#elenco").html("<span>Elenco: </span>" + filme["elenco"]);
        $("#genero").html("<span>Gêneros: </span>" + filme["genero"]);
        $("#cenas").text("<span>Cenas e Momentos: </span>" + filme["cenas"]);
    })
}

