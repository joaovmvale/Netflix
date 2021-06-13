$(document).ready(function(){

    $("#btn-search").click(function(){
        fSearchTitle();
    })

});


function fSearchTitle(){
    var keyword = $("#ipt-search").val();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../php/search.php",
        data: {'keyword': keyword},
        success: function(retorno){
            window.location.href = "../search"
        }
    });
}