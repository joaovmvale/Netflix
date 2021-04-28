$(document).ready(function(){

    fValidaSessao('validaSessao')

	$("#bContinuar").click(function(){
		fLocalComunicaServidor('form-altCadastro', 'alterarDados');
	});

});

function fValidaSessao(arquivo){

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

function fLocalComunicaServidor(formulario, arquivo){
	var dados = $("#"+formulario).serialize();

	$.ajax({
		type:"POST",
		dataType: "json",
		url: "../../php/" + arquivo + ".php",
		data: dados,
		success: function(retorno){
			if(retorno.funcao == "retorno"){
				alert(retorno.mensagem);
				window.location.href = "../logado";
			}
		}
		
	});
}