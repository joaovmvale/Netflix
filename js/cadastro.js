$(document).ready(function(){

    fLocalComunicaServidor();
	
});

function fLocalComunicaServidor(){
    $("#btnCadastrar").click(function(){
        var senha_hash_md5 = $.MD5($("#cadSenha").val());
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../pages/email-confirmacao.php",
            data: {
                email: $("#cadMail").val(),
                senha: senha_hash_md5,
            },
            success: function(retorno){}
        })
        location.href="../pages/cadastroEnviado.html";
        return false;
    });
}