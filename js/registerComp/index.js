$(document).ready(function(){


	$("#bContinuar").click(function(){
		fLocalComunicaServidor('form-register', 'registerComp')
		return false;
	});

});

function fLocalComunicaServidor(formulario, arquivo){
	var dados = $("#"+formulario).serialize();

	$.ajax({
		type:"POST",
		dataType: "json",
		url: "../../php/" + arquivo + ".php",
		data: dados,
		success: function(retorno){
            if(retorno.funcao == "cadastro") 
			{
				if (retorno.status == "ok"){
                    alert(retorno.mensagem);
                    window.location.href = "../login/";
                }else{
                    alert(retorno.mensagem);
                }
			}
        }

	});
}