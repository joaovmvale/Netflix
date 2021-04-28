$(document).ready(function(){


	$("#bContinuar").click(function(){
		
		var sha256 = sjcl.hash.sha256.hash($('#password').val());
		var sha256_hexa = sjcl.codec.hex.fromBits(sha256);

		$("#password_hash").val(sha256_hexa);

		fLocalComunicaServidor('form-register', 'register')

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
				if(retorno.status == "s")
				{
					alert(retorno.mensagem);
					window.location.href = "../registerConf/index.html";
				}
				else
				{
					alert(retorno.mensagem);
				}
			}
		}
		
	});
}