$(document).ready(function(){
    $("#bContinuar").click(function(){
        fLocalComunicaServidor('form-recover', 'recoverPassEmail')
        
        return false;
    });
});

function fLocalComunicaServidor(formulario, arquivo){
    var dados = $('#'+formulario).serialize();

    $.ajax({
        type:"POST",
		dataType: "json",
		url: "../../php/" + arquivo + ".php",
		data: dados,
		success: function(retorno){

            if (retorno.funcao == "recover"){
                if (retorno.status == "enviado"){
                    window.location.href = "../registerPassSent";
                    alert(retorno.mensagem);
                }else if (retorno.status == "completar"){
                    window.location.href = "../registerComp";
                    alert(retorno.mensagem);
                }else{
                    window.location.href = "../register";
                    alert(retorno.mensagem);
                }
            }
        }

    });
}