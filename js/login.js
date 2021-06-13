$(document).ready(function(){


	$("#bContinuar").click(function(){
		
		var sha256 = sjcl.hash.sha256.hash($('#password').val());
		var sha256_hexa = sjcl.codec.hex.fromBits(sha256);

		$("#password_hash").val(sha256_hexa);

		fLocalComunicaServidor('form-login', 'login')

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

			if(retorno.funcao == "login") 
			{
                if (retorno.status == "verificar"){
                    alert(retorno.mensagem);
                    window.location.href = "../registerConf";
                }else if (retorno.status == "cadastrar"){
                    alert(retorno.mensagem);
                    window.location.href = "../register";
                }else if(retorno.status == "continuar"){
                    alert(retorno.mensagem);
                    window.location.href = "../registerComp/";
                }else if (retorno.status == "logar"){
					alert(retorno.mensagem);
                    window.location.href = "../browse";
                }else if (retorno.status == "adm"){
					alert(retorno.mensagem);
					window.location.href = "../cadastroFilmes";
				}else if (retorno.status == "senha"){
					alert(retorno.mensagem);
					window.location.reload();
				}
			}
		}
	});
}