$(document).ready(function(){


	$("#bContinuar").click(function(){

		fLocalComunicaServidor('form-register', 'recoverPassChange')

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

			if(retorno.funcao == "change") 
			{
				if(retorno.status == "ok")
				{
					alert(retorno.mensagem);
					window.location.href = "../login";
				}
				else if (retorno.status == "nok")
				{
                    alert(retorno.mensagem);
                    window.location.reload();
				}
                else if (retorno.status == "senha")
                {
                    alert(retorno.mensagem);
                    window.location.reload();
                }
			}
		}
		
	});
}