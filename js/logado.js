$(document).ready(function(){

	fLocalComunicaServidor('validaSessao')

});


function fLocalComunicaServidor(arquivo){

	$.ajax({
		type:"POST",
		dataType: "json",
		url: "../../php/" + arquivo + ".php",
		success: function(retorno){

			if(retorno.funcao == "valida-sessao") 
			{
				if(retorno.status == "t")
				{
				}
				else
				{
					window.location.href = "../login";
				}
			}
		}
		
	});

}