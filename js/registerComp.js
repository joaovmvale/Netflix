$(document).ready(function(){

	hibridCpfCnpj();

	$("#bContinuar").click(function(){
		fLocalComunicaServidor('form-register', 'registerComp')
		return false;
	});

});

function hibridCpfCnpj(){
	$('#cadCpfCnpj').mask('000.000.000-00', {
		onKeyPress : function(cadcpfcnpj, e, field, options) {
		  const masks = ['000.000.000-000', '00.000.000/0000-00'];
		  const mask = (cadcpfcnpj.length > 14) ? masks[1] : masks[0];
		  $('#cadCpfCnpj').mask(mask, options);
		}
	  });
}

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
                    window.location.href = "../login";
                }else{
                    alert(retorno.mensagem);
                }
			}
        }

	});
}